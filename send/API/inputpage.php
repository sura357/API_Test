<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>inputpage</title>
  <style>
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 200px;
    }
  </style>
</head>
<body>
  <form action="api.php" method="get">
    請輸入字串:
    <input type="text" id="input" name="input" required>
    <br><br>
    <input type="submit" value="送出">
  </form>
</body>
</html>