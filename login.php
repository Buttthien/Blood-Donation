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
        }
        else
        {
            if($row['Function_Account'] == 'Hospital'){
                $getHospitalID = $conn->prepare("SELECT ID as accountID FROM hospital_account WHERE ID_Account = ?");
                $getHospitalID->bind_param("i", $_SESSION['ID']);
                $getHospitalID->execute();
                $examinerResult = $getHospitalID->get_result();
                $hospitalRow = $examinerResult->fetch_assoc();
                if($examinerResult->num_rows>0)
                {
                    $_SESSION['hospitalID'] = $hospitalRow['accountID'];
                }
                header("Location: hospitalaccount.php"); // to the after-login page    HOSPITAL
            }else if($row['Function_Account'] == 'Examiner'){
                $getHospitalID = $conn->prepare("SELECT `ID_Hospital_Account` as accountID FROM examiner WHERE ID_Account = ?");
                $getHospitalID->bind_param("i", $_SESSION['ID']);
                $getHospitalID->execute();
                $examinerResult = $getHospitalID->get_result();
                $hospitalRow = $examinerResult->fetch_assoc();
                if($examinerResult->num_rows>0)
                {
                    $_SESSION['hospitalID'] = $hospitalRow['accountID'];
                }
                header("Location: examineraccount.php"); // to the after-login page    EXAMINER
            }
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