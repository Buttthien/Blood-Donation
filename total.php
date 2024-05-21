<?php 
include('connect/connect.php');
?>

<form action="" method = "post" class = "mb-2">
<!-- Total Blood -->
<?php
        $select_data = "Select SUM(Amount) AS total_blood from `blood_bank`";
        $result_data = mysqli_query($conn, $select_data );
        
        while($row_data = mysqli_fetch_assoc($result_data)){
          //$ID_Account = $row_data['ID_Account'];
          //$Blood_Type = $row_data['Blood_Type'];
          $total_blood = $row_data['total_blood'];
          echo 
          " <div class ='col-md-4 mb-2'>
          <div class='card' >
          //<img src='...' class='card-img-top' alt='...'>
          <div class='card-body'>
            <p class='card-text'>' $total_blood </p>
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
          echo "<div class='card'>
          //<img src='...' class='card-img-top' alt='...'>
          <div class='card-body'>
            <p class='card-text'>$total_hospital </p>
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
          echo "<div class='card' >
          //<img src='...' class='card-img-top' alt='...'>
          <div class='card-body'>
            <p class='card-text'>$total_donator </p>
          </div>
          </div>";
        }
        ?>


</form>
