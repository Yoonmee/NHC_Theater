<?php
include('config.php');

$theater_id = $_POST['theater_id'];
$sql = "SELECT * FROM NHC_PLAY";
$result = odbc_do($con, $sql);
//$rows = odbc_fetch_row($result);

// while(odbc_fetch_row($result))
// {
//   $id = odbc_result($result, 1);
//   $name = odbc_result($result, 2);
//   $runningtime = odbc_result($result, 3);
//   $price = odbc_result($result, 4);
//   echo $id;
//   echo $name;
//   echo $runningtime;
//   echo $price;
// }

$rows = array();

while ($r = odbc_fetch_row($result)) {
  $rows[] = $r;
}

echo json_encode($rows);


// function raw_json_encode($input) {
//
//     return preg_replace_callback(
//         '/\\\\u([0-9a-zA-Z]{4})/',
//         function ($matches) {
//             return mb_convert_encoding(pack('H*',$matches[1]),'UTF-8','UTF-16');
//         },
//         json_encode($input)
//     );
//
// }
//
// $theater_id = 1;
// //$theater_id = $_POST['theater_id'];
// $sql = "SELECT * FROM NHC_PLAY";
// $result = odbc_do($con, $sql);
// //$rows = odbc_fetch_row($result);
// //
// // $data = array();
// // if($result){
// //
// //     // while(odbc_fetch_row($result)){
// //     //     array_push($data,
// //     //         array('id'=> odbc_result($result, 1),
// //     //         'name'=>odbc_result($result, 2),
// //     //         'runningtime'=>odbc_result($result, 3),
// //     //         'price'=>odbc_result($result, 4)
// //     //     ));
// //     //     echo odbc_result($result, 1);
// //     //
// //     // }
// //     $i = 0;
// //     while(odbc_fetch_row($result)){
// //     $i++;
// //           $data[$i][] = odbc_result($result, 1);
// //           $data[$i][] = odbc_result($result, 2);
// //           $data[$i][] = odbc_result($result, 3);
// //           $data[$i][] = odbc_result($result, 4);
// //     }
// //
// //     echo "<pre>"; print_r($data); echo '</pre>';
// //
// //     echo serialize($data);
// //     //header('Content-Type: application/json; charset=utf8');
// //     //$json = json_encode(array($data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
// //     //echo "$json";
// // }
//
// //$sql1 = "INSERT INTO NHC_SCREENINGPLAY (ID, PLAYID, THEATERID, MAXBOOK, CURRENTBOOK, PRICE, SCREENTIME) VALUES ('2', '4', '1', 0, 0, 20000, '20171225')";
// //$result1 = odbc_exec($con, $sql1);
// //echo "$result1";
// // echo json_encode($data);
//
//
// while ($r = odbc_fetch_assoc($result)) {
//   $rows[] = $r;
// }
//
// $plays = array();
//
// foreach ($rows as $play) {
//   $play_id = $play['PLAYID'];
//   $sql = "SELECT * FROM NHC_SCREEINGPLAY WHERE THEATERID = '{$theater_id}' AND PLAYID = '{$play_id}'";
//   $result = odbc_do($con, $sql);
//
//   //if 0 -> add movie
//   $num_rows = odbc_num_rows($result);
//   if (!$num_rows) {
//     $plays[] = $play;
//   }
// }
//
// echo json_encode($plays);

odbc_close($con);
?>
