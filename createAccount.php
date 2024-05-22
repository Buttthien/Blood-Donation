<?php
include('connect/connect.php');

// Check if role is set from login.php
if(isset($_GET['role'])) {
    $role = $_GET['role'];
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
            <!-- form 1 -->
            <form action="addAccount.php" method="post" id="form1">
                <?php if(isset($_GET['error'])): ?>
                    <p class="error"><?php echo htmlspecialchars($_GET['error']) ?></p>
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
                            <option value="Hospital">Hospital</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit" name="addAccount">Create Account</button>
                    </div>
                </div>
            </form>

            
    </div>
</div>
</body>
</html>



