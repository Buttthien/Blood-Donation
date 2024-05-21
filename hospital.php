<?php 
include('connect/connect.php');
?>


<form action="" method = "post" class = "mb-2">

<div class = "row">

<div class = "column">
<!-- Table -->
<table class="table">
    <thead>
        <tr>
        <th>ID Hospital</th>
        <th>Private Name</th>
        <th>Total Blood</th>
        <th>Examinor</th>
        </tr>
    </thead>
    <tbody >

<?php
//ID
    $select_query ="SELECT HA.ID as id FROM `hospital_account` as HA, `Account` as A WHERE HA.ID_Account = A.ID";
    $result_query = mysqli_query($conn, $select_query);

    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['id'];
        echo"
        <tr>
        <td>$id</td>
        ";
//Name
$select_query_name ="SELECT Private_Name as name FROM `account` WHERE ID = $id";
$result_query_name = mysqli_query($conn, $select_query_name);

($row = mysqli_fetch_assoc($result_query_name));
$Name = $row['name'];
echo"
    <td>$Name</td>
";
//Amount
        $select_query_blood_total ="SELECT SUM(Amount) as total_blood FROM `blood_bank` WHERE ID_Hospital = $id";
        $result_query_blood_total = mysqli_query($conn, $select_query_blood_total);

    ($row = mysqli_fetch_assoc($result_query_blood_total));
        $total_blood_hos = $row['total_blood'];
        if($total_blood_hos == 0){
            echo"
            <td>0</td>";
        }else{
        echo"
            <td>$total_blood_hos</td>";
    }
    
//Examinor
    $select_query_examinor ="SELECT COUNT(ID) as num FROM `examinor` WHERE ID_Hospital_Account = $id";
    $result_query_examinor = mysqli_query($conn, $select_query_examinor);

    ($row = mysqli_fetch_assoc($result_query_examinor));
        $examinor = $row['num'];
        echo"
            <td>$examinor</td>
            </tr>";
    
}
?>

    </tbody>
</table>


        </div>

</div>

</form>