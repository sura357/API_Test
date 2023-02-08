# API_Test
請使用xampp作為虛擬環境，並將send資料夾放進xampp/htdocs裡

## 前置作業：
1. 開啟XAMPP Control Panel 
2. 打開Apache與MySQL(Start按鈕)
3. 至http://localhost/phpmyadmin
4. 在左側任意點選進一個資料庫
5. 點選上排的SQL並執行以下代碼創建資料庫與資料表
```
CREATE DATABASE apitest;

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `hexData` varchar(500) NOT NULL,
  `timeStamp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
```
- 如執行失敗，則刷新頁面查看apitest資料庫是否已被創建，如是，點選進去之後執行上面的程式碼，但省略掉第一行關於資料庫創建的語法。

## APItest/send：
對應題目第一點
使用方式：
1. 在瀏覽器輸入：http://localhost/API/inputpage.php
	- 如有特別更改過xampp裡MySQL的port，則需要改為：http://localhost:[port]/API/inputpage.php
	- [port]為後來更改設定的port
2. 輸入字串，並按下送出之後，可以至http://localhost/phpmyadmin查看

檔案說明：
api.php:將資料存入資料庫
connect.php:連接資料庫
inputpage.php:用於輸入任意字串，並送出至api.php進行處理
returnHaxData.php:將資料從資料庫撈出並回傳
returnRandomID.php:取得所有id並回傳

## APItest/read：
對應題目第二點
使用方式：
1. 開啟APItest/read/readAPI/readAPI/bin/Debug/readAPI.exe
2. 輸入id並送出，或是按下隨機按鈕
3. 顯示結果

檔案說明：
APItest/read/readAPI/readAPI/Form1.cs:使用API並取得回傳數值，顯示於listbox
