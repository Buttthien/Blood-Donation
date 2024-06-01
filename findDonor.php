<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: 404.php'));
}
include('connect/connect.php');

if (isset($_POST['donorCID'])) {
    $CID = $_POST['donorCID'];
    $Phone = $_POST['donorPhone'];
    $getDonor = $conn->prepare("SELECT 
    Name,
    Blood_Type,
    SUM(Amount) AS Total_Amount,
    MAX(Date) AS Last_Donation_Date
    FROM 
    Donator
    WHERE Citizen_Identification = ?
    AND Phone = ?
    GROUP BY 
    Name, Blood_Type;
    ");
    
    $getDonor->bind_param("ii", $CID, $Phone); // Use "i" for integer binding
    
    $data = [];
    if ($getDonor->execute()) {
        $result = $getDonor->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Format the date to only include day, month, and year
                $row['Last_Donation_Date'] = date("d-m-Y", strtotime($row['Last_Donation_Date']));
                $data[] = $row;
            }
            $_SESSION['donator_data'] = $data;
        } else {
            $_SESSION['donator_data'] = [];
        }
    }

    $conn->close();
    
    // Output the data as a JSON response
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>
