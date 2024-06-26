<?php
  include('connect/connect.php');
  session_start();

  // Check if user is logged in
  if (!isset($_SESSION['userName']) && $role != 'Hospital') {
    header('Location: loginPage.php');
    exit();
  }

  if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    $ID_Hospital = $_SESSION['ID'];
    $userName = $_SESSION['userName'];
} else {
    
}
    $user = $_SESSION['userName'];
    
    //ID HOSPITAL START
    $sql = "SELECT ha.ID as var FROM `account` AS a, `hospital_account` as ha WHERE a.ID = ha.ID_Account AND a.ID = $ID_Hospital "; 
    $result = $conn->query($sql);
      $row = $result->fetch_assoc();
       $_SESSION['ID_Hospital'] = $row['var'];

    //ID HOSPITAL END


    // Prevent access to createAccount from other roles
    if($role == 'Admin')
    {
      header("Location: admin.php?createAccount&role=$role");
    }
    else if($role == 'Examiner')
    {
      header("Location: examineraccount.php?createAccount&role=$role");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="utf-8">
    <title>Admin Account</title>

    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

  


    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Healthy Blood</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="about.php" class="nav-item nav-link">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="feature.php" class="dropdown-item">Feature</a>
                        <a href="team.php" class="dropdown-item">Donation Highlights</a>
                        <a href="Whydonate.php" class="dropdown-item">Why donate blood?</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <li class="profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <?php
                    echo"<li><a class='dropdown-item' href='#'>@$user </a></li>"
                    ?>
                    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                </ul>
            </li>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Testing NavBar Start -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="hospitalaccount.php?hospitaltotal">Total</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hospitalaccount.php?hospitalexaminer">Examiner</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="hospitalaccount.php?hospitaldetails">Details</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Blood Delivering
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="hospitalaccount.php?transfer">Queue</a></li>
            <li><a class="dropdown-item" href="hospitalaccount.php?queue">Request Form</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="hospitalaccount.php?createAccount&role=<?php echo $role; ?>">Add Account</a>
        </li>
      
        <form class="d-flex" role="search">
        <input class="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      </ul>
    </div>

  </div>
</nav>


    <!-- Testing NavBar End -->



    <!-- Searching Button Start -->

    <!-- Child Class Start -->
    <div class = "container my-5">
      <?php
          if(isset($_GET['hospitaltotal'])){
            include('hospitaltotal.php');
          }else if(isset($_GET['hospitalexaminer'])){
            include('hospitalexaminer.php');
          }else if(isset($_GET['createAccount'])){
            include('createAccount.php');
          }else if(isset($_GET['hospitaldetails'])){
            include('hospitaldetails.php');
          }else if(isset($_GET['searching'])){
            include('searching.php');
          }else if(isset($_GET['transfer'])){
            include('transfer.php');
          }else if(isset($_GET['queue'])){
            include('queue.php');
          }
      ?>
    </div>

    <!-- Child Class End -->







    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>