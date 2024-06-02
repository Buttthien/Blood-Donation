<?php
include('connect/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Type']) && isset($_POST['Amount'])) {
    $select_type = $_POST['Type'];
    $amount = $_POST['Amount'];
    $hospital_id = $_SESSION['ID_Hospital'];

    // Insert into queue
    $sql = "INSERT INTO `queue` (Blood_Type, Amount, ID_Hospital, Status)
            VALUES ('$select_type', $amount, $hospital_id, 'waiting')";
    $res = mysqli_query($conn, $sql);

    // Set a success message
    $success_message = "Blood request submitted successfully!";
}
?>

<form action="" method="post" class="mb-2">
    <h2 class="text-center"> REQUIRE BLOOD FORM</h2>
    <div class="row g-3">
        <div class="col-12 col-sm-6">
            <select class="form-select border-0" name="Type" style="height: 55px;">
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
            <button class='btn btn-primary w-100 py-3' type='submit'>Submit</button>
        </div>
    </div>
</form>

<?php
if (isset($success_message)) {
    echo "<div class='alert alert-success'>$success_message</div>";
}
?>
