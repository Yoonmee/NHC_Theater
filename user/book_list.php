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
  <!-- JS
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
  $(function() {
    //예매목록 불러오기
    $.post('../php/book_list.php', {id: "<?php echo $_SESSION['user']['id']; ?>"}, function(data, textStatus, xhr) {
      if (textStatus == "success")
      {
        var table = $('#book_table');
        var book_list = JSON.parse(data);

        $.each(book_list, function(i, val) {
          table.append('<tr><td>'+val.ID+'</td><td>'+val.USERID+'</td><td>'+val.SCREENID+'</td><td>'+val.TIMESTAMP+'</td></tr>');
        });
      }
    });
  });
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
    <!-- <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reservation Check</h2> -->

    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <li><a href="./">User Page</a></li>
      <li class="active"> Reservation Check</li>
    </ol>
    <hr>

    <!-- 예매목록 -->
    <table class="table table-hover" id="book_table">
      <thead>
        <tr>
          <th>예매 ID</th>
          <th>유저 ID</th>
          <th>상영 영화 ID</th>
          <th>예매 시각</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>

    <hr>
    <button class="btn btn-lg btn-default btn-block" onclick="location.href='./';">뒤로</button>
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
