<?php

require_once("db_summary.php");
require_once("config.php");

    if($_POST){
      $id = $_POST["de"];
    }
    else{
      include("../jobpop/contact.php");
      exit;
    }

    try{
      $pdo = new summary($host,$dbname,$user,$pass);
      $pdo ->connectDB();

      if(isset($id)){
        $pdo->findDEL($id);
      }
    }
    catch(PDOExeption $e){
      exit("データ失敗".$e->getMessage());
    }

    echo "削除しました。";

?>

<a href="index.php"><p>トップに戻る</p></a>
