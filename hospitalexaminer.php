<?php 
include('connect/connect.php');
$idd = $_SESSION['ID'];
?>


<form action="" method = "post" class = "mb-2">

<div class = "row">

<!-- Table -->
<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Private Name</th>
        <th scope="col">Address</th>

        </tr>
    </thead>
    <tbody >

<?php
//ID

$select_query ="SELECT ID as id FROM `Examiner` WHERE ID_Account = $idd";
    $result_query = mysqli_query($conn, $select_query);

    while($row = mysqli_fetch_assoc($result_query)){
        $id = $row['id'];
        echo"
        <tr>
        <td>$id</td>
        ";
//Name
$select_query_name ="SELECT a.Private_Name as namee FROM `account` AS a, 'Examiner' AS e WHERE a.ID = $idd";
$result_query_name = mysqli_query($conn, $select_query_name);

($row = mysqli_fetch_assoc($result_query_name));
$Name = $row['namee'];
echo"
    <td>$Name</td>
    ";

//Address
$select_query_name ="SELECT a.Address as addresss FROM `account` AS a, 'Examiner' AS e WHERE a.ID = $idd";
$result_query_name = mysqli_query($conn, $select_query_name);

($row = mysqli_fetch_assoc($result_query_name));
$addresss = $row['addresss'];
echo"
    <td>$Addresss</td>
    </tr>";

}
?>

    </tbody>
</table>



</div>

</form>