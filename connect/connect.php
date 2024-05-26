<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "blood_donation";

$conn = mysqli_connect($host, $user, $pass, $db);
//$conn = new mysqli('localhost', 'root', ' ', 'blood_donation');

        if($conn->connect_error)
        {
            echo "Failed to connect to Database".$conn->connect_error;
        }

        if(isset($_GET['queue_id'])){

            $queue_id = $_GET['queue_id'];
            $hospital_id = $_GET['hospital_id'];

            //INSERT INTO HISTORY OF TRANSFER
            $sql = "INSERT INTO History_Of_Transfer(ID_Queue, ID_Adapted_Hospital)
                    VALUES ($queue_id, $hospital_id)";
            $res = mysqli_query($conn, $sql);

            //CHANGE 'WAITING' STATUS INTO 'DONE' Status
            $sql = "UPDATE `Queue`
            SET Status = 'done'
            WHERE ID = $queue_id;
            ";
            $res = mysqli_query($conn, $sql);

            //BLOOD TYPE OF QUEUE
            $select_data = "SELECT Blood_Type FROM `queue` WHERE ID = $queue_id ";
            $result_data = mysqli_query($conn, $select_data );
            $row_data = mysqli_fetch_assoc($result_data);
            
            //------------------------- 1------------------------
            $Type = $row_data['Blood_Type'];


            // Blood Type and Amount of Blood_Bank of 2 Hospital
            //REQUIRER
            $select_data = "SELECT bk.Amount AS present, q.Amount AS needy, q.ID_Hospital AS ID_HA  
                            FROM `blood_bank` AS bk, `Queue` AS q
                            WHERE q.ID_Hospital = bk.ID_Hospital 
                            AND bk.Blood_Type = $Type AND q.ID = $queue_id ";
            $result_data = mysqli_query($conn, $select_data );
            $row_data = mysqli_fetch_assoc($result_data);
            
            //------------------------- 2&3$4------------------------
            $id_needy = $row_data['ID_HA'];
            $blood1 = $row_data['present'];
            $needy = $row_data['needy'];

            //ADAPTER
            $select_data = "SELECT Amount FROM `blood_bank` WHERE ID_Hospital = $hospital_id AND Blood_Type = $Type ";
            $result_data = mysqli_query($conn, $select_data );
            $row_data = mysqli_fetch_assoc($result_data);
            
            //------------------------- 5------------------------
            $blood2 = $row_data['Amount'];

            //UPDATE BLOOD BANK OF 2 HOSPITALS
            //REQUIRER
            $sql = "UPDATE `blood_bank`
            SET Amount = $blood1 + $needy
            WHERE Blood_Type = $Type
            AND ID_Hospital = $id_needy
            ";
            $res = mysqli_query($conn, $sql);

            //ADAPTER
            $sql = "UPDATE `blood_bank`
            SET Amount = $blood2 - $needy
            WHERE Blood_Type = $Type
            AND ID_Hospital = $hospital_id
            ";
            $res = mysqli_query($conn, $sql);
            
            // POP UP NOTIFICATION
            $incart = "Adapted Form";
            echo json_encode([ "in_cart" => $incart]);
        }


?>