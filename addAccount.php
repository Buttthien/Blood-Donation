<?php
include('connect/connect.php');
session_start(); // Start the session

if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}

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
            header("Location: admin.php?createAccount&role=" . urlencode($role) . "&error=" . urlencode("Username already exists"));
            exit();
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into the database
            $insertQuery = $conn->prepare("INSERT INTO account (Private_Name, UserName, Password, Address, Function_Account) VALUES (?, ?, ?, ?, ?)");
            $insertQuery->bind_param("sssss", $privateName, $userName, $hashedPassword, $address, $functionAccount);
            
            if($insertQuery->execute()) {
                // Redirect to login page after successful insertion
                header("Location: admin.php?createAccount&role=" . urlencode($role) . "&error=" . urlencode("Add account successfully!"));
                exit(); // Exit to prevent further execution
            } else {
                echo "Error: " . $insertQuery->error; // Handle database insertion error
            }
        }
    } else {
        header("Location: admin.php?createAccount&role=" . urlencode($role) . "&error=" . urlencode("Please fill in all required fields"));
        exit(); // Exit to prevent further execution
    }
}
?>
