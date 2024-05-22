<?php
include('connect/connect.php');

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
        $checkUsername = "SELECT * FROM account WHERE UserName='$userName'";
        $result = $conn->query($checkUsername);
        if($result->num_rows > 0) {
            header("Location: admin.php?createAccount&error=Username already exists");
            exit();
        } else {
            // Insert data into the database
            $insertQuery = "INSERT INTO account (Private_Name, UserName, Password, Address, Function_Account)
                            VALUES ('$privateName', '$userName', '$password', '$address', '$functionAccount')";
            if($conn->query($insertQuery) === TRUE) {
                // Redirect to login page after successful insertion
                header("Location: admin.php?createAccount&error=Add account successfully!");
                exit(); // Exit to prevent further execution
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error; // Handle database insertion error
            }
        }
    } else {
        header("Location: admin.php?createAccount&error=Please fill in all required fields");
        exit(); // Exit to prevent further execution
    }
}
?>
