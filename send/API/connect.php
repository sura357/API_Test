	<?php
	$host = 'localhost';
	//改成你登入phpmyadmin帳號
	$user = 'root';
	//改成你登入phpmyadmin密碼
	$passwd = '';
	//資料庫名稱
	$database = 'apiTest';
	//實例化mysqli(資料庫路徑, 登入帳號, 登入密碼
	$db_link = @mysqli_connect($host, $user, $passwd,$database);
 
	if(!$db_link)
		die("連結失敗");
	
	//mysqli_query($db_link,"SET NAMES 'utf-8'");
	
	?>