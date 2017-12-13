<?php
if(!isset($_SESSION['user'])) {
    header("location: ../index.php");
}
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>KHU Theater User Page</title>


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
  function fill_cash() {
    var fill = $('#fillcash');
    var in_cash = fill.val();
    if (in_cash <= 0) {
      alert("자연수만 입력해주세요.");
      return false;
    } else if (in_cash > 100000) {
      alert("한번에 10만원 이하만 충전할 수 있습니다.");
      return false;
    }

    $.post('../php/fill_cash.php', {
        cash: in_cash,
        user_id: "<?php echo $_SESSION['user']['id']; ?>"
      }, function(data, textStatus, xhr) {
        //alert("data: ", data);
        if (textStatus == "success")
        {
          alert("충전되었습니다.");

          //update session
          window.location.href = '../php/update_user_session.php';
        }
    });
  }
  </script>
</head>
<body>
  <div class="container">
    <h2><span class="glyphicon glyphicon-eur" aria-hidden="true"></span> Fill Cash</h2>

    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <li><a href="./">User Page</a></li>
      <li class="active">Fill Cash</li>
    </ol>
    <hr>

    <div class="form-group">
      <label for="fillcash">충전할 금액을 입력하세요</label>
      <input type="number" id="fillcash" class="form-control" placeholder="ex) 3000" required autofocus>
    </div>

    <hr>
    <button class="btn btn-lg btn-success btn-block" onclick="fill_cash();">캐시 충전</button>
    <button class="btn btn-lg btn-default btn-block" onclick="location.href='./';">뒤로</button>
  </div>

  <footer class="footer">
    <div class="container">
      <button type="button" class="btn btn-default" onclick="location.href='../php/logout.php';">
        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout
      </button>
    </div>
  </footer>
</body>
</html>
