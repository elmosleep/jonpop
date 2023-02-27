<?php

require_once("db_summary.php");
require_once("config.php");

  echo "このお問い合わせ内容でよろしかったでしょうか？"."<br>";

  if($_POST){
    $name = $_POST["name"];
    $kana = $_POST["kana"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $content = $_POST["content"];
  }
  else{
    include("../jobpop/contact.php");
  exit;
  }

    try{
      $pdo = new summary($host,$dbname,$user,$pass);
      $pdo ->connectDB();

      if($_POST){
        $pdo ->findREG($_POST);
      }
    }
    catch(PDOExeption $e){
      exit("データ失敗".$e->getMessage());
    }

 ?>

<html>
<head>
<meta charset="UTF-8">
<title>JOBPOP</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
  <?php echo $name."<br>"; ?>
  <?php echo $kana."<br>"; ?>
  <?php echo $tel."<br>"; ?>
  <?php echo $email."<br>"; ?>
  <?php echo $content."<br>"; ?>
  <form action="conplete.php" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="kana" value="<?php echo $kana; ?>">
    <input type="hidden" name="tel" value="<?php echo $tel; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="content" value="<?php echo $content; ?>">
    <a href="conplete.php"><input type="submit" value="送 信"/></a>
  </form>

</body>
</html>
