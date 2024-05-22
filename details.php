<?php 
include('connect/connect.php');
?>

<form action="" method = "post" class = "mb-2">
<div class="row">
<?php
        //FIND DISTINCT TYPE OF BLOOD
        $select_data = "SELECT DISTINCT Blood_Type AS blood from `blood_bank`";
        $result_data = mysqli_query($conn, $select_data );

        while($row_data = mysqli_fetch_assoc($result_data)){
          $blood = $row_data['blood'];
          
          //FIND AMOUNT OF EACH TYPE OF BLOOD
          $select_each_blood = "SELECT SUM(Amount) AS total_each_blood from `blood_bank` WHERE Blood_Type = '$blood'";
          $result_each_blood = mysqli_query($conn, $select_each_blood );
            
          $row_data = mysqli_fetch_assoc($result_each_blood);
          $each_blood = $row_data['total_each_blood'];
          echo
          " <div class ='col-md-4 mb-2'>
          
          <div class='card' >
          <img src='img/image_blood1.jpg' class='' alt=''>
          <div class='card-body'>
            <p class='card-text'>$blood : $each_blood </p>
          </div>
          </div>
        
          </div>
          ";
        }
?>
</div>
</form>