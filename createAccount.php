<?php
include('connect/connect.php');

// Check if role is set from login.php
if(isset($_GET['role'])) {
    $role = htmlspecialchars($_GET['role']);
} else {
    // Default role if not set
    $role = 'default';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/main.js"></script>
</head>
<body>
<div class="col-lg-9 wow fadeInUp createAccountForm" data-wow-delay="0.5s">
    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
        <?php
        // Define account types for Admin and Hospital
        $accountTypes = [
            'Admin' => 'Hospital',
            'Hospital' => 'Examiner'
        ];

        // Check for the Examiner role and render a specific form
        if ($role === 'Examiner') { ?>
            <form action="addExaminerAccount.php" method="post" id="formExaminer">
                <?php if(isset($_GET['error'])): ?>
                    <p class="error"><?php echo htmlspecialchars($_GET['error']) ?></p>
                <?php endif; ?>
                <?php if(isset($_GET['success'])): ?>
                    <p class="success"><?php echo htmlspecialchars($_GET['success']) ?></p>
                <?php endif; ?>
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="Name" placeholder="Full Name" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="Age" placeholder="Age" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="Phone" placeholder="Phone Number" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="C_ID" placeholder="Citizen Identification" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="Blood_Amount" placeholder="Blood Amount" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <select class="form-select border-0" name="Blood_Type" style="height: 55px;">
                            <option selected disabled>Choose Blood Type</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit" name="addExaminerAccount">Add Donator</button>
                    </div>
                </div>
            </form>
        <?php } else if (array_key_exists($role, $accountTypes)) { ?>
            <form action="addAccount.php" method="post" id="form1">
                <?php if(isset($_GET['error'])): ?>
                    <p class="error"><?php echo htmlspecialchars($_GET['error']) ?></p>
                <?php endif; ?>
                <?php if(isset($_GET['success'])): ?>
                    <p class="success"><?php echo htmlspecialchars($_GET['success']) ?></p>
                <?php endif; ?>
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="Private_Name" placeholder="Full Name" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="UserName" placeholder="Username" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" name="Address" placeholder="Address" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="password" class="form-control border-0" name="Password" placeholder="Password" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <select class="form-select border-0" name="Function_Account" style="height: 55px;">
                            <option selected disabled>Choose Account Type</option>
                            <option value="<?php echo $accountTypes[$role]; ?>"><?php echo $accountTypes[$role]; ?></option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit" name="addAccount">Create Account</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
