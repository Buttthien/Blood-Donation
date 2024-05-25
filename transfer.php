<?php 
include('connect/connect.php');
$id = $_SESSION['ID'];
?>

<form action="" method = "post" class = "mb-2">
<h2 class="text-center"> BLOOD QUEUE</h2>
<div class="row">
<?php
//FIND DISTINCT TYPE OF BLOOD
        $select_data = "SELECT A.Private_Name AS hospital_name,Q.ID AS id_queue, Q.Blood_Type AS blood_type, Q.Amount AS blood_amount
                        from `queue` AS Q, `account` AS A, `hospital_account` AS h
                        WHERE h.ID_Account = A.ID AND h.ID = Q.ID_Hospital AND Q.Status = 'waiting' ";
        $result_data = mysqli_query($conn, $select_data );
        while($row_data = mysqli_fetch_assoc($result_data)){
            $private_name = $row_data['hospital_name'];
            $id_queue = $row_data['id_queue'];
            $blood = $row_data['blood_type'];
            $amount = $row_data['blood_amount'];

            if(isset($_POST['button'])){
                $sql = "INSERT INTO History_Of_Transfer (ID_Queue, ID_Adapted_Hospital)
                VALUES ($id_queue, $idd)";

            if (mysqli_query($conn, $sql)) {
                echo "Accept successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            }

            echo"
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

            <button type='button' name = 'button' class='btn btn-primary btn-sm'>Accept</button>
        </div>
    </div>
";
}
?>

</div>
</form>