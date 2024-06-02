<?php 
include('connect/connect.php');
$id = $_SESSION['ID'];
$id_ha = $_SESSION['ID_Hospital'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['queue_id'])) {
    $queue_id = $_POST['queue_id'];
    $hospital_id = $id_ha;

    // Process the queue acceptance logic here, similar to the JavaScript version

    // INSERT INTO HISTORY OF TRANSFER
    $sql = "INSERT INTO History_Of_Transfer(ID_Queue, ID_Adapted_Hospital)
            VALUES ($queue_id, $hospital_id)";
    $res = mysqli_query($conn, $sql);

    // CHANGE 'WAITING' STATUS INTO 'DONE' Status
    $sql = "UPDATE `Queue`
            SET Status = 'done'
            WHERE ID = $queue_id;";
    $res = mysqli_query($conn, $sql);

    // BLOOD TYPE OF QUEUE
    $select_data = "SELECT Blood_Type FROM `queue` WHERE ID = $queue_id";
    $result_data = mysqli_query($conn, $select_data);
    $row_data = mysqli_fetch_assoc($result_data);
    $Type = $row_data['Blood_Type'];

    // Blood Type and Amount of Blood_Bank of 2 Hospital
    // REQUIRER
    $select_data = "SELECT bk.Amount AS present, q.Amount AS needy, q.ID_Hospital AS ID_HA
                    FROM `blood_bank` AS bk, `Queue` AS q
                    WHERE q.ID_Hospital = bk.ID_Hospital
                    AND bk.Blood_Type = '$Type' AND q.ID = $queue_id";
    $result_data = mysqli_query($conn, $select_data);
    $row_data = mysqli_fetch_assoc($result_data);
    $id_needy = $row_data['ID_HA'];
    $blood1 = $row_data['present'];
    $needy = $row_data['needy'];

    // ADAPTER
    $select_data = "SELECT Amount FROM `blood_bank` WHERE ID_Hospital = $hospital_id AND Blood_Type = '$Type'";
    $result_data = mysqli_query($conn, $select_data);
    $row_data = mysqli_fetch_assoc($result_data);
    $blood2 = $row_data['Amount'];

    // UPDATE BLOOD BANK OF 2 HOSPITALS
    // REQUIRER
    $sql = "UPDATE `blood_bank`
            SET Amount = $blood1 + $needy
            WHERE ID_Hospital = $id_needy AND Blood_Type = '$Type'";
    $res = mysqli_query($conn, $sql);

    // ADAPTER
    $sql = "UPDATE `blood_bank`
            SET Amount = $blood2 - $needy
            WHERE ID_Hospital = $hospital_id AND Blood_Type = '$Type'";
    $res = mysqli_query($conn, $sql);

    // Set a success message
    $success_message = "Adapted Form";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="path_to_your_css_file.css">
    <style>
        .fade-out {
            transition: opacity 2s ease-out;
        }
        .hidden {
            opacity: 0;
        }
    </style>
    <script>
        function handleClick(button) {
            button.textContent = 'Adapted Form';
            button.classList.add('fade-out');
            setTimeout(() => {
                button.classList.add('hidden');
            }, 2000);
        }
    </script>
</head>
<body>
    <form action="" method="post" class="mb-2">
        <h2 class="text-center"> BLOOD QUEUE</h2>
        <div class="row">
            <?php
            $select_data = "SELECT A.Private_Name AS hospital_name, Q.ID AS id_queue, Q.Blood_Type AS blood_type, Q.Amount AS blood_amount
                            FROM `queue` AS Q, `account` AS A, `hospital_account` AS h
                            WHERE h.ID_Account = A.ID AND h.ID = Q.ID_Hospital AND Q.Status = 'waiting' AND Q.ID_Hospital <> $id_ha";
            $result_data = mysqli_query($conn, $select_data);
            while($row_data = mysqli_fetch_assoc($result_data)){
                $private_name = $row_data['hospital_name'];
                $id_queue = $row_data['id_queue'];
                $blood = $row_data['blood_type'];
                $amount = $row_data['blood_amount'];

                echo "
                <div class='card' style='width: 18rem;'>
                    <img src='img/hospital.jpg' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$private_name</h5>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>$id_queue</li>
                        <li class='list-group-item'>$blood</li>
                        <li class='list-group-item'>$amount</li>
                    </ul>
                    <div class='card-body'>
                        <form method='post'>
                            <input type='hidden' name='queue_id' value='$id_queue'>
                            <button type='submit' class='btn btn-primary btn-sm' onclick='handleClick(this)'>Accept</button>
                        </form>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </form>

    <?php
    if (isset($success_message)) {
        echo "<div class='alert alert-success'>$success_message</div>";
    }
    ?>
</body>
</html>
