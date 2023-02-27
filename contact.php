<?php

  require_once("db_summary.php");
  require_once("config.php");

  function h($s) {
      return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }

    try{
      $pdo = new summary($host,$dbname,$user,$pass);
      $pdo ->connectDB();

      $result = $pdo->findAll();
    }
  catch(PDOExeption $e){
    exit("データ失敗".$e->getMessage());
  }



?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>JOBPOP</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery_validate.js"></script>
<script>

  $(function(){
    $('#call').validate({

      rules: {
          name: { required: true },
          content: { required: true },
          tel: { required: true },
          email: { required: true },
      },

      messages: {
          name: {
            required: '<br>お名前を入力して下さい',
          },
          email: {
            required: '<br>メールアドレスを入力して下さい',
          },
          tel: {
            required: '<br>電話番号を入力して下さい',
          },
          content: {
            required: '<br>お問い合わせ内容入力して下さい',
          },
        },
    });
  });

</script>
</head>
<body>
  <div id="wrapper">

    <?php
      require("summary.php");
    ?>

  </div>

  <h1>Content</h1>
  <h2>下記の項目をご記入の上送信ボタンを押してください</h2>

  <p id="text">送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
  なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。<br>
  <span class="red">*</span>は必須項目となります。</p>


  <div id="call_form">
    <form id="call" action="confirm.php" method="post">
      <table>
        <tbody>
          <tr><th>氏名<span class="red">*</span></th>
            <td><input type="text" name="name" class="check"></td>
          </tr>
          <tr><th>フリガナ</th>
            <td><input type="text" name="kana" class="check"></td>
          </tr>
          <tr><th>電話番号<span class="red">*</span></th>
            <td><input type="text" name="tel" class="check"></td>
          </tr>
          <tr><th>メールアドレス<span class="red">*</span></th>
            <td><input type="text" name="email" class="check"></td>
          </tr>
          </tbody>
        </table>

        <h2>1.お問い合わせ内容をご記入ください<span class="red">*</span></h2>

        <table>
          <tbody>
            <td><textarea name="content" class="check"></textarea></td>
          </tbody>
            <tr><td><a href="confirm.php"><input type="submit" value="送 信"/></a></td></tr>
        </table>

      </form>
    </div>

    <section>

      <h1>送信結果一覧</h1>

      <table>
        <tr>
          <th>id</th>
          <th>氏名</th>
          <th>電話番号</th>
          <th>メールアドレス</th>
          <th>お問い合わせ</th>
          <th>編集</th>
          <th>削除</th>
        </tr>

  <?php foreach ($result as $row) : ?>

        <tr>
          <th><?php echo $row['id'] ?></th>
          <th><?php echo $row['name'] ?></th>
          <th><?php echo $row['tel'] ?></th>
          <th><?php echo $row['email'] ?></th>
          <th><?php echo $row['content'] ?></th>

          <th>
            <form id="update" action="update.php" method="post">
              <a href="update.php">
                <input type="submit" value="編集" />
                <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                <input type="hidden" name="name" value="<?php echo $row["name"]?>">
                <input type="hidden" name="tel" value="<?php echo $row["tel"]?>">
                <input type="hidden" name="email" value="<?php echo $row["email"]?>">
                <input type="hidden" name="content" value="<?php echo $row["content"]?>">
              </a>
            </form>
          </th>

          <th>
            <form id="delete" action="delete.php" method="post">
              <a href="delete.php">
                <input type="submit" name="remove" value="削除" />
                <input type="hidden" name="de" value="<?php echo $row["id"]?>">
              </a>
            </form>
          </th>

        </tr>
   <?php endforeach ?>
      </table>

    </section>


  <?php
    require("summary2.php");
  ?>


</body>
</html>
