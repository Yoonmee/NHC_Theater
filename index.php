<?php
if(isset($_SESSION['admin'])) {
    header("location: admin/");
}

if(isset($_SESSION['user'])) {
    header("location: user/");
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>NHC Theater Kiosk System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/2-col-portfolio.css" rel="stylesheet">
  <!-- CSS
  <link rel="stylesheet" href="http://163.180.118.201/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://163.180.118.201/assets/css/bootstrap-theme.min.css">
-->

  <!-- JS
  <script src="http://163.180.118.201/assets/js/jquery-1.12.2.min.js"></script>
  <script src="http://163.180.118.201/assets/js/bootstrap.min.js"></script>
-->

  <style>
  .form-signin .checkbox {
    font-weight: normal;
  }
  .form-signin .form-control {
    position: relative;
    height: auto;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  </style>

  <script>
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">NHC_Theater</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./php/sign_up.php">Sign up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- <h2><span class="glyphicon glyphicon-film" aria-hidden="true"></span> NHC Theater kiosk system</h2> -->

    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <li class="active">Login</li>
    </ol>

    <hr>
    <!--
      User
      Admin -> 로그인 모달 창 띄우기
    -->
    <!-- <button class="btn btn-lg btn-primary btn-block" onclick="location.href='./user/';">USER</button> -->
    <button class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#userLogin">USER</button>
    <button class="btn btn-lg btn-default btn-block" data-toggle="modal" data-target="#adminLogin">ADMIN</button>
  </div>


  <!-- user login Modal -->
  <div class="modal fade" id="userLogin" tabindex="-1" role="modal" aria-labelledby="userLoginModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="userLoginModalLabel">User Login</h4>
        </div>

        <div class="modal-body">
          <form class="form-signin" id="userLoginForm" action="php/user_login.php" method="POST">
            <label for="inputID" class="sr-only">User ID</label>
            <input type="text" id="inputUserID" name="inputID" class="form-control" placeholder="User ID" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputUserPassword" name="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- admin login Modal -->
  <div class="modal fade" id="adminLogin" tabindex="-1" role="modal" aria-labelledby="adminLoginModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="adminLoginModalLabel">Admin Login</h4>
        </div>

        <div class="modal-body">
          <form class="form-signin" id="adminLoginForm" action="php/admin_login.php" method="POST">
            <label for="inputID" class="sr-only">Admin ID</label>
            <input type="text" id="inputAdminID" name="inputID" class="form-control" placeholder="Admin ID" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputAdminPassword" name="inputPassword" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
