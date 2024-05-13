<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Donation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Health Care </h1>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#">How to donate?</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
      </nav>
    </header>
    <form class="form-horizontal" action="/signin.php" method="post" id="signinForm">
      <div class="form-group">
        <label for="username_or_email" class="col-sm-2 col-form-label">Username or Email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="username_or_email" id="username_or_email" placeholder="Username or Email">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 col-form-label">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label for="remember_me">
              <input type="checkbox" name="remember_me" id="remember_me"> Remember Me
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" form="signinForm" class="btn btn-primary">Sign In</button>
          <a href="#">Forgot Password?</a>
        </div>
      </div>
    </form>        
    <main>
      <div class="row">
        <div class="col-sm-6">
          <h2>Blood stocks are low! We urgently need more donors to give blood</h2> <li><a href="#">Blood type</a></li>
          <p></p>
        </div>
        <div class="col-sm-6">
          <h2>About Blood</h2>
          <ul>
            <li><a href="#">Benefits of blood donation</a></li>
            <li><a href="#">Blood Donation Process</a></li>
            <li><a href="#">Blood Shortage</a></li>
          </ul>
        </div>
      </div>
    </main>

    <footer class="page-footer">
      <p>&copy; 2024 Blood Donate Website</p> <li><a href="#">Contact us</a></li>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.

