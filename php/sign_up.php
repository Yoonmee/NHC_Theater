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
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/2-col-portfolio.css" rel="stylesheet">
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
    function goPrevPage() {
      history.back();
      return true;
    }
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
            <a class="nav-link" href="../index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./sign_up.php">Sign up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- <h2><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Sign Up</h2> -->

    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <li class="active">Sign Up</li>
    </ol>

    <hr>
    <!-- 너맘대로 채워넣으세여 -->
    <form class="form-group" action="sign_up_check.php" name="signupForm" method="post">

      <div class="form-group" id="inputID">
        ID:
        <input class="form-control" type="text" name="ID">
      </div>
      <div class="form-group" id="inputPassword">
        Password:
        <input class="form-control" type="text" name="Password">
      </div>
      <div class="form-group" id="inputName">
        Name:
        <input class="form-control" type="text" name="Name">
      </div>
      <div class="form-group" id="inputPhone">
        Phone:
        <input class="form-control" type="text" name="Phone" placeholder="-를 빼고 입력하세요.">
      </div>

      <p align="center">
        <input type="submit" value="회원가입" style="margin-right: 20px; width: 80px;">
        <input type="reset" value="취소" onclick='return goPrevPage();' style="width: 80px;">
      </p>
    </form>


  </div>

  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
