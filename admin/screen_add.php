<?php
if(!isset($_SESSION['admin_id'])) {
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
  <title>NHC Theater Admin Page</title>

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
<script src="http://code.jquery.com/jquery-1.10.2.js"> </script>
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
    //play DB 목록에 있으면서 현재 상영중이지 않은 연극 목록들 Load

    $.post('../php/available_plays.php', {theater_id: "1"}, function(data, textStatus, xhr) {
      console.log("data: ", data);
      //alert(data);
      if (textStatus == "success")
      {
        var plays = JSON.parse(data);
        var option = $('#play');
        //console.log(plays);

        $.each(plays, function(i, val) {
          console.log(val);
          //console.log(val.NAME);
          //console.log(val.RUNNINGTIME);
          option.append($('<option>', {
            value: val['id'],
            text: "제목: " + val['name'] + ", 상영시간(분): " + val['runningtime']
          }, '</option>'));
        });
      }
    });

    // $.post('../php/available_plays.php', {theater_id: "1"}, function(data, textStatus, xhr) {
    //   console.log("data: ", data);
    //
    //   if (textStatus == "success")
    //   {
    //     //var plays = JSON.parse(data);
    //     var option = $('#play');
        // var plays = <php echo json_encode(unserialize($data))?>;
    //
    //     $.each(plays, function(i, val) {
    //       option.append($('<option>', {
    //         value: val.ID,
    //         text: "제목: " + val.NAME + ", 상영시간(분): " + val.RUNNINGTIME
    //       }, '</option>'));
    //     });
    //   }
    // });

  });

  function add_screen() {
    var playID = $('#play').val();
    if (playID == -1)
    {
      alert("상영할 연극을 선택해주세요");
      return false;
    }

    var play_seats = $('#seats').val();
    if (!play_seats)
    {
      alert("좌석을 입력해주세요");
      return false;
    }

    //var datetime = new Date(time);

    //console.log(datetime);

    $.post('../php/add_screen.php', {play_id: playID, theater_id: "1"}, function(data, textStatus, xhr) {
      console.log(data);
      console.log(textStatus);
      console.log(xhr);
      alert("상영 연극이 추가되었습니다.");

      //move
      window.location.href = './';
    });
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
    <!-- <h2><span class="glyphicon glyphicon-film" aria-hidden="true"></span> Add Screen</h2> -->

    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <li class="active"> Add Screen</li>
    </ol>
    <hr>

    <!-- 영화 목록 -->
    <div class="form-group">
      <label for="play">추가 상영 가능 연극 목록</label>
      <select id="play" class="form-control">
        <option value="-1">선택</option>
      </select>
    </div>

    <div class="form-group">
      <label for="seats">좌석 수 입력</label>
      <input type="number" id="seats" class="form-control" required></select>
    </div>

    <hr>
    <button class="btn btn-lg btn-primary btn-block" onclick="add_screen();">상영 연극 추가</button>
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
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
