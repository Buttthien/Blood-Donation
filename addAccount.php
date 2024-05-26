<?php
include('connect/connect.php');
session_start(); // Start the session

$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;

if(isset($_POST['addAccount'])) {
    // Check if all required fields are present and not empty
    if(isset($_POST['Private_Name'], $_POST['UserName'], $_POST['Password'], $_POST['Address'], $_POST['Function_Account']) &&
       !empty($_POST['Private_Name']) && !empty($_POST['UserName']) && !empty($_POST['Password']) && !empty($_POST['Address']) && !empty($_POST['Function_Account'])) {
        
        // Retrieve form data
        $privateName = $_POST['Private_Name'];
        $userName = $_POST['UserName'];
        $password = $_POST['Password'];
        $address = $_POST['Address'];
        $functionAccount = $_POST['Function_Account'];

        // Check if username already exists
        $checkUsername = $conn->prepare("SELECT * FROM account WHERE UserName = ?");
        $checkUsername->bind_param("s", $userName);
        $checkUsername->execute();
        $result = $checkUsername->get_result();

        if($result->num_rows > 0) {
            if($role === 'Admin')
            {
                header("Location: admin.php?createAccount&role=" . urlencode($role) . "&error=" . urlencode("Username already exists"));
                exit();
            }
            else
            {
                header("Location: hospitalaccount.php?createAccount&role=" . urlencode($role) . "&error=" . urlencode("Username already exists"));
                exit();
            }

        } else {

            // Insert data into the database
            $insertQuery = $conn->prepare("INSERT INTO account (Private_Name, UserName, Password, Address, Function_Account) VALUES (?, ?, ?, ?, ?)");
            $insertQuery->bind_param("sssss", $privateName, $userName, $password, $address, $functionAccount);
            
            if($insertQuery->execute()) {
                // If account is created successfully and the role is Examiner
                if($functionAccount === 'Examiner') {
                    $ID_Account = $conn->insert_id; // Get the ID of the newly inserted account

                    // Retrieve hospital account ID
                    /*
                    $getHospitalID = $conn->prepare("SELECT ID as accountID FROM hospital_account WHERE ID_Account = ?");
                    $getHospitalID->bind_param("i", $_SESSION['ID']);
                    $getHospitalID->execute();
                    $examinerResult = $getHospitalID->get_result();
                    */
                    
                    if (isset($_SESSION['hospitalID'])) {
                        // $row = $examinerResult->fetch_assoc();
                        // $hospitalIdAccount = $row['accountID'];

                        $hospitalIdAccount = $_SESSION['hospitalID'];

                        // Insert into examiner table
                        $insertHptQuery = $conn->prepare("INSERT INTO examiner (ID_Account, ID_Hospital_Account) VALUES (?, ?)");
                        $insertHptQuery->bind_param("ii", $ID_Account, $hospitalIdAccount);
                        if(!$insertHptQuery->execute()) {
                            echo "Error: " . $insertHptQuery->error; // Handle database insertion error for examiner table
                        }
                    } else {
                        echo "Error: Hospital account ID not found"; // Handle case where hospital account ID is not found
                    }
                }
                // Redirect to login page after successful insertion
                if($role === 'Admin')
                {
                    header("Location: admin.php?createAccount&role=" . urlencode($role) . "&success=" . urlencode("Add Account Successfully"));
                    exit(); // Exit to prevent further execution
                }
                else
                {
                    header("Location: hospitalaccount.php?createAccount&role=" . urlencode($role) . "&success=" . urlencode("Add Account Successfully"));
                    exit(); // Exit to prevent further execution
                }
            } else {
                echo "Error: " . $insertQuery->error; // Handle database insertion error
            }
        }
    } else {
        if($role === 'Admin')
        {
            header("Location: admin.php?createAccount&role=" . urlencode($role) . "&error=" . urlencode("Please fill in all required fields"));
            exit(); // Exit to prevent further execution
        }
        else
        {
            header("Location: hospitalaccount.php?createAccount&role=" . urlencode($role) . "&error=" . urlencode("Please fill in all required fields"));
            exit(); // Exit to prevent further execution
        }

    }
}
?>
