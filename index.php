<html>
<head>
<meta charset="UTF-8">
<title>JOBPOP</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script>

    $(function(){
      setTimeout("movimovi()");
    })



    function movimovi(){
     $("#chapter1").fadeIn(2000,function(){
       $("#chapter1").fadeOut(2000,function(){
         $("#chapter2").fadeIn(2000,function(){
           $("#chapter2").fadeOut(2000,function(){

             });
            });
         });
        });
        setTimeout("movimovi()",8000);
       };



</script>
</head>
<body>
  <div id="wrapper">

    <?php
      require("summary.php");
    ?>

  </div>

  <div id="content">
    <div id="top_img"><img src="img/main_img.jpg"></div>
    <div id="chapter1"></div>
    <div id="chapter2"></div>
    <img src="img/title.png">


    <div id="menu_btn">

      <ul class="moji">

        <li><a href="what.php"><img src="img/btn01.png"></a>
        <p>ジョブポップとはこういう会社です。</p>
        <p class="ao">more</p></li>

        <li><a href="company.php"><img src="img/btn02.png"></a>
        <p>会社概要</p>
        <p class="ao">more</p></li>

        <li><a href="recruit.php"><img src="img/btn03.png"></a>
        <p>随時スタッフ募集しています。</p>
        <p class="ao">more</p></li>

        <li><a href="qa.php"><img src="img/btn04.png"></a>
        <p>よくある質問Q&A</p>
        <p class="ao">more</p></li>

        <li><a href="contact.php"><img src="img/btn05.png"></a>
        <p>ジョブポップへのお問い合わせ</p>
        <p class="ao">more</p></li>

      </ul>
    </div>
  </div>




  <?php
    require("summary2.php");
  ?>


</body>
</html>
