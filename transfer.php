<?php 
include('connect/connect.php');
$id = $_SESSION['ID'];
$id_ha = $_SESSION['ID_Hospital'];
?>

<form action="" method = "post" class = "mb-2">
    
<h2 class="text-center"> BLOOD QUEUE</h2>
<div class="row">
    <?php
        //LOCAL VARIABLE:
            //$queue_id = array();
            //$queue_name = array();

        //COUNT
            //$count = -1;

        //FIND DISTINCT TYPE OF BLOOD
                $select_data = "SELECT A.Private_Name AS hospital_name,Q.ID AS id_queue, Q.Blood_Type AS blood_type, Q.Amount AS blood_amount
                                from `queue` AS Q, `account` AS A, `hospital_account` AS h
                                WHERE h.ID_Account = A.ID AND h.ID = Q.ID_Hospital AND Q.Status = 'waiting' AND Q.ID_Hospital <> $id_ha ";
                $result_data = mysqli_query($conn, $select_data );
                while($row_data = mysqli_fetch_assoc($result_data)){
                    
                    //COUNT INCREASE
                    //$count ++;

                    $private_name = $row_data['hospital_name'];
                    //PUSH NAME OF EACH QUEUE FORM
                    //array_push($queue_name, $private_name);
                    
                    $id_queue = $row_data['id_queue'];
                    //PUSH ID OF EACH QUEUE FORM
                    //array_push($queue_id, $id_queue);
                    
                    $blood = $row_data['blood_type'];
                    $amount = $row_data['blood_amount'];


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
                    <button type='button' queue_id = '$id_queue' id_ha = '$id_ha' name = 'button' class='btn btn-primary btn-sm'>Accept</button>
                </div>
            </div>
        ";
        }
    ?>

</div>
</form>


<script>
     var queue_id = document.getElementsByName("button");
     //
     for (var i = 0; i <queue_id.length; i++){
     queue_id[i].addEventListener("click", function(event){
        var target  = event.target;
        var queue_id = target.getAttribute("queue_id");
        var hospital_id = target.getAttribute("id_ha");

        
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    var data = JSON.parse(this.responseText);
                    target.innerHTML = data.in_cart;
                    //document.getElementById("badge").innerHTML = data.num_cart;
                }
            }

            xml.open("GET", "connect/connect.php?queue_id="+queue_id+"&hospital_id=" + hospital_id, true);
            xml.send();
      })
    }
</script>