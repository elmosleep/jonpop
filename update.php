<?php

$test;

require_once("db_summary.php");
require_once("config.php");

  if($_POST){
    $id = $_POST["id"];
    $name = $_POST["name"];
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

    if($id){
      $pdo->findADD($id);
    }
  }
  catch(PDOExeption $e){
    exit("データ失敗".$e->getMessage());
  }




 ?>

<meta charset="utf-8">
 <form id="update" action="update2.php" method="post">
     <input type="hidden" name="id" value="<?php echo $id?>">
   <label>名前：</label>
     <input type="text" name="name" value="<?php if (!empty($name)) echo(htmlspecialchars($name, ENT_QUOTES, 'UTF-8'));?>"><br>
   <label>電話番号：</label>
     <input type="text" name="tel" value="<?php if (!empty($tel)) echo(htmlspecialchars($tel, ENT_QUOTES, 'UTF-8'));?>"><br>
   <label>メールアドレス：</label>
     <input type="text" name="email" value="<?php if (!empty($email)) echo(htmlspecialchars($email, ENT_QUOTES, 'UTF-8'));?>"><br>
   <label>お問い合わせ内容：</label>
     <input type="text" name="content" value="<?php if (!empty($content)) echo(htmlspecialchars($content, ENT_QUOTES, 'UTF-8'));?>"><br>
     <input type="submit" value="編集" />
 </form>
