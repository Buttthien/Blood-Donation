<?php 
include('connect/connect.php');
?>


<form action="" method = "post" class = "mb-2">

<div class = "row">
<div class ="col-md-2 bg-secondary p-0">
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href="#" class="nav-link"><h4>Hospital<h4></a>
    </li>
    <?php
                $select_data = "SELECT DISTINCT Private_Name, B.ID as id FROM `hospital_account` as A, `account` as B WHERE A.ID_Account = B.ID ";
                $result_data = mysqli_query($conn, $select_data );
                
                while($row_data = mysqli_fetch_assoc($result_data)){
                  $private_name = $row_data['Private_Name'];
                  $id = $row_data['id'];
                  echo "<li class='nav-item'>
                  
                  <a class='nav-link' href='index.php?id_hospital=$id' text-light><h4>$private_name<h4></a>
                </li>";
                
                }
        ?>
  </ul>
</div>



</div>

</form>