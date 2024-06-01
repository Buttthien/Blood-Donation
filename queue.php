<?php
include('connect\connect.php');

    if(isset($_POST['Type'])){
        $select_type = $_POST['Type'];
    }
    if(isset($_POST['Amount'])){
        $amount = $_POST['Amount'];
    }
?>

<form action="" method = "post" class = "mb-2">
<h2 class="text-center"> REQUIRE BLOOD FORM</h2>
<div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <select class="form-select border-0" name="Type" style="height: 55px;">
                            <!--<option selected disabled>Choose Account Type</option> -->
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="Amount" placeholder="Amount of Blood" style="height: 55px;">
                    </div>

                    <div class="col-12">
                        <button class='btn btn-primary w-100 py-3' blood_type = '<?php $select_type ?>' amount = '<?php $amount ?>'  type='submit' name= 'button'>Submit</button>
                    </div>
                </div>

</form>

<script>
     var queue = document.getElementsByName("button");
     //
     queue.addEventListener("click", function(event){
        var target  = event.target;
        var blood_type = target.getAttribute("blood_type");
        var amount = target.getAttribute("amount");
        alert(blood_type);
        
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    var data = JSON.parse(this.responseText);
                    target.innerHTML = data.in_cart;
                    //document.getElementById("badge").innerHTML = data.num_cart;
                }
            }

            xml.open("GET", "connect/connect.php?blood="+blood_type+"&amount=" + amount, true);
            xml.send();
        
      })
    
</script>