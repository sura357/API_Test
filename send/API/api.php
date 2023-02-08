<?php
// 載入連線資料庫的檔案
include("connect.php");

//防呆
if(!isset($_GET["input"]))
{
    echo "無參數，請傳入參數";
    return;
}

$data = $_GET["input"];

// 將字串以 utf8 編碼成 Hex string
$hex_data = bin2hex($data);

// // 產生 unique id
// $unique_id = uniqid();

// 取得目前的 UTC timestamp
$timestamp = time();

// 將資料寫入資料庫
$query = "INSERT INTO test (hexData, timeStamp) VALUES ('$hex_data', '$timestamp')";
//echo $query;
mysqli_query($db_link, $query);


// 關閉資料庫連線
mysqli_close($db_link);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  <style>
    .back {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 200px;
    }
  </style>
</head>
<body>
<div class="back">
    <button onclick="history.back()">回到上一頁</button>
</div>
</body>
</html>
