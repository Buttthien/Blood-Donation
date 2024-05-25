<?php
?>

<form action="" method = "post" class = "mb-2">
<h2 class="text-center"> REQUIRE BLOOD FORM</h2>
<div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <select class="form-select border-0" name="Blood Type" style="height: 55px;">
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
                        <button class="btn btn-primary w-100 py-3" type="submit" name="addAccount">Submit</button>
                    </div>
                </div>

</form>