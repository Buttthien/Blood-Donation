<?php 

include('connect/connect.php');

//session_start();


$idd = $_SESSION['ID'];
?>

<form action="" method = "post" class = "mb-2">
<div class="row">



<!-- Total Blood -->
<?php
        $select_data = "Select SUM(Amount) AS total_blood from `blood_bank` WHERE ID_Hospital = $idd";
        $result_data = mysqli_query($conn, $select_data );

        ($row_data = mysqli_fetch_assoc($result_data));
        {
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
<!-- Total Examiner -->

    <?php
        $select_data = "Select COUNT(*) AS worker from `examiner` WHERE ID_Hospital_Account = $idd";
        $result_data = mysqli_query($conn, $select_data );
        
        while($row_data = mysqli_fetch_assoc($result_data)){
          $total_examiner = $row_data['worker'];
          echo "<div class ='col-md-4 mb-2'>
          
          <div class='card'>
          <img src='img/image_blood1.jpg' class='card-img-top' alt='...'>
          <div class='card-body'>
            <p class='card-text'>Examiner: $total_examiner </p>
          </div>
          </div>
          
          </div>";
        }
        ?>

</div>
</form>
