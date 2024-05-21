<?php 
include('connect/connect.php');
?>

<form action="" method = "post" class = "mb-2">
<div class="row">



<!-- Total Blood -->
<?php
        $select_data = "Select SUM(Amount) AS total_blood from `blood_bank`";
        $result_data = mysqli_query($conn, $select_data );

        while($row_data = mysqli_fetch_assoc($result_data)){
          $total_blood = $row_data['total_blood'];
          echo
          " <div class ='col-md-4 mb-2'>
          
          <div class='card' >
          <img src='img/image_blood1.jpg' class='' alt=''>
          <div class='card-body'>
            <p class='card-text'>Total Blood: $total_blood </p>
          </div>
          </div>
        
          </div>
          ";
        }
        ?>
<!-- Total Account_Hospital -->
    <?php
        $select_data = "Select COUNT(*) AS total_hospital from `hospital_account`";
        $result_data = mysqli_query($conn, $select_data );
        
        while($row_data = mysqli_fetch_assoc($result_data)){
          //$ID_Account = $row_data['ID_Account'];
          //$Blood_Type = $row_data['Blood_Type'];
          $total_hospital = $row_data['total_hospital'];
          echo "<div class ='col-md-4 mb-2'>
          
          <div class='card'>
          <img src='img/image_blood1.jpg' class='card-img-top' alt='...'>
          <div class='card-body'>
            <p class='card-text'>Hospital: $total_hospital </p>
          </div>
          </div>
          
          </div>";
        }
        ?>
    
<!-- Total Donator -->

      <?php
        $select_data = "Select COUNT(ID) AS total_donator from `donator`";
        $result_data = mysqli_query($conn, $select_data );
        
        while($row_data = mysqli_fetch_assoc($result_data)){
          //$ID_Account = $row_data['ID_Account'];
          //$Blood_Type = $row_data['Blood_Type'];
          $total_donator = $row_data['total_donator'];
          echo "<div class ='col-md-4 mb-2'>
          
          <div class='card' >
          <img src='img/image_blood1.jpg' class='card-img-top' alt='...'>
          <div class='card-body'>
            <p class='card-text'>Donator: $total_donator </p>
          </div>
          </div>
          
          </div>
          ";
        }
        ?>
<!-- Total Activity -->
<?php
        $select_data = "Select COUNT(ID) AS total_ac from `blood_bank`";
        $result_data = mysqli_query($conn, $select_data );
        
        while($row_data = mysqli_fetch_assoc($result_data)){
          //$ID_Account = $row_data['ID_Account'];
          //$Blood_Type = $row_data['Blood_Type'];
          $total_ac = $row_data['total_ac'];
          echo "<div class ='col-md-4 mb-2'>
          
          <div class='card' >
          <img src='img/image_blood1.jpg' class='card-img-top' alt='...'>
          <div class='card-body'>
            <p class='card-text'>Total activities: $total_ac </p>
          </div>
          </div>
          
          </div>
          ";
        }
        ?>

</div>
</form>
