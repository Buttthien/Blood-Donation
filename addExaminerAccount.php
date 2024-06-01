<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    die( header( 'location: 404.php' ) );
    }



include('connect/connect.php');
session_start(); // Start the session
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;
$hospitalID = isset($_SESSION['hospitalID']) ? $_SESSION['hospitalID'] : null;

if (isset($_POST['addExaminerAccount'])) {
    if (isset($_POST['Name'], $_POST['Age'], $_POST['Phone'], $_POST['C_ID'], $_POST['Blood_Amount'], $_POST['Blood_Type']) 
        && !empty($_POST['Name']) && !empty($_POST['Age']) && !empty($_POST['Phone']) && !empty($_POST['C_ID']) 
        && !empty($_POST['Blood_Amount']) && !empty($_POST['Blood_Type'])) 
    {
        $name = $_POST['Name'];
        $age = $_POST['Age'];
        $phone = $_POST['Phone'];
        $C_ID = $_POST['C_ID'];
        $bloodAmount = $_POST['Blood_Amount'];
        $bloodType = $_POST['Blood_Type'];

        // Check if Citizen_identification exists
        $checkCId = $conn->prepare("SELECT * FROM `Donator` WHERE `Citizen_identification` = ?");
        $checkCId->bind_param("i", $C_ID);
        $checkCId->execute();
        $result = $checkCId->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $donorID = $row['ID'];

            // Update donor blood amount
            $updateDonorBlood = $conn->prepare("UPDATE Donator SET Amount = Amount + ? WHERE ID = ?");
            $updateDonorBlood->bind_param("ii", $bloodAmount, $donorID);

            if (!$updateDonorBlood->execute()) {
                echo "Error updating donor: " . $updateDonorBlood->error;
            }
        } else {
            // Insert new donor
            $insertNewDonor = $conn->prepare("INSERT INTO Donator (Citizen_identification, Age, Phone, Blood_Type, Name, Amount) VALUES (?, ?, ?, ?, ?, ?)");
            $insertNewDonor->bind_param("iisssi", $C_ID, $age, $phone, $bloodType, $name, $bloodAmount);

            if (!$insertNewDonor->execute()) {
                echo "Error inserting new donor: " . $insertNewDonor->error;
            }
        }

        // Update or insert into blood_bank
        $checkBloodBank = $conn->prepare("SELECT * FROM `blood_bank` WHERE `ID_Hospital` = ? AND `Blood_Type` = ?");
        $checkBloodBank->bind_param("is", $hospitalID, $bloodType);
        $checkBloodBank->execute();
        $bloodBankResult = $checkBloodBank->get_result();

        if ($bloodBankResult->num_rows > 0) {
            $updateBloodBank = $conn->prepare("UPDATE `blood_bank` SET Amount = Amount + ? WHERE `ID_Hospital` = ? AND `Blood_Type` = ?");
            $updateBloodBank->bind_param("iis", $bloodAmount, $hospitalID, $bloodType);

            if (!$updateBloodBank->execute()) {
                echo "Error updating blood bank: " . $updateBloodBank->error;
            }
        } else {
            $insertBloodBank = $conn->prepare("INSERT INTO blood_bank (ID_Hospital, Blood_Type, Amount) VALUES (?, ?, ?)");
            $insertBloodBank->bind_param("isi", $hospitalID, $bloodType, $bloodAmount);

            if (!$insertBloodBank->execute()) {
                echo "Error inserting into blood bank: " . $insertBloodBank->error;
            }
        }

        header("Location: examineraccount.php?createAccount&role=" . urlencode($role) . "&success=" . urlencode("Operation Successful"));
        exit();
    } else {
        header("Location: examineraccount.php?createAccount&role=" . urlencode($role) . "&error=" . urlencode("Please fill in all required fields"));
        exit();
    }
}
?>
