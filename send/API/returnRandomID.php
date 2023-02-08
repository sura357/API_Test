<?php
// 載入連線資料庫的檔案
include("connect.php");



// 查詢資料庫
$query = "
SELECT id 
FROM test" ;

$result = mysqli_query($db_link, $query);


for($i=1;$i<=mysqli_num_rows($result);$i++)
{
    $row = mysqli_fetch_row($result);
    echo $row[0].",";
}


// 關閉資料庫連線
mysqli_close($db_link);
?>