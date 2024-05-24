<?php

include('connect\connect.php');

if(isset($_POST['signInButton'])) 
{
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM account WHERE UserName='$userName' and Password='$password'";

    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['userName'] = $row['UserName'];
        $_SESSION['role'] = $row['Function_Account'];
        $_SESSION['ID'] = $row['ID'];
        if( $row['Function_Account'] == 'Admin'){
        header("Location: admin.php?total"); // to the after-login page   ADMIN
        }else if($row['Function_Account'] == 'Hospital'){
        header("Location: hospitalaccount.php"); // to the after-login page    HOSPITAL
        }else if($row['Function_Account'] == 'Examiner'){
        header("Location: examineraccount.php"); // to the after-login page    EXAMINER
        }
        exit();
    }
    else
    {
        header("Location: loginPage.php?error=Incorrect User Name of Password");
        exit();
    }
}
?>