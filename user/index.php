<?php
if(!isset($_SESSION['user'])) {
    header("location: ../index.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>NHC Theater User Page</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/2-col-portfolio.css" rel="stylesheet">
  <!-- CSS
  <link rel="stylesheet" href="http://163.180.118.201/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://163.180.118.201/assets/css/bootstrap-theme.min.css">
-->

  <!--JS
  <script src="http://163.180.118.201/assets/js/jquery-1.12.2.min.js"></script>
  <script src="http://163.180.118.201/assets/js/bootstrap.min.js"></script>
-->

  <style>
  body {
    /* Margin bottom by footer height */
    margin-bottom: 60px;
  }
  .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    /* Set the fixed height of the footer here */
    height: 60px;
    background-color: #f5f5f5;
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
            <a class="nav-link" href="../php/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Page</h2> -->
    <ol class="breadcrumb">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <li class="active"><?php echo $_SESSION['user']['name'] ?></li>

    </ol>
    <hr>

    <?php
    #print user's info
    echo "<pre>";
    print_r($_SESSION['user']);
    echo "</pre>";
    ?>
    <hr>

    <button class="btn btn-lg btn-primary btn-block" onclick="location.href='./book.php';">예매</button>
    <button class="btn btn-lg btn-primary btn-block" onclick="location.href='./book_list.php';">예매 내역 확인</button>
    <button class="btn btn-lg btn-danger btn-block" onclick="location.href='./book_cancel.php';">예매 취소</button>
    <!-- <button class="btn btn-lg btn-success btn-block" onclick="location.href='./cash.php';">캐시 충전</button> -->
  </div>

  <!--
  <footer class="footer">
    <div class="container">
      <button type="button" class="btn btn-default" onclick="location.href='../php/logout.php';">
        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout
      </button>
    </div>
  </footer>
-->

  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
