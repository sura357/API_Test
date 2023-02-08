<?php
// 載入連線資料庫的檔案
include("connect.php");

//防呆
if(!isset($_GET["id"]))
{
    echo "無參數，請傳入參數";
    return;
}

$id = $_GET["id"];

// 查詢資料庫
$query = "
SELECT hexData 
FROM test
WHERE id = " . $id . "
LIMIT 1" ;

$result = mysqli_query($db_link, $query);

$row = mysqli_fetch_row($result);

if(isset($row[0]))
    echo $row[0];


// 關閉資料庫連線
mysqli_close($db_link);
?>