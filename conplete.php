<?php
  echo "お問い合わせ完了いたしました。"."<br>";

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
?>

<html>
<head>
<meta charset="UTF-8">
<title>JOBPOP</title>
</head>
<body>

  <a href="index.php"><p>トップに戻る</p></a>


</body>
</html>
