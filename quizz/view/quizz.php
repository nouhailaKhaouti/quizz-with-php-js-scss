<?php 
include_once "../php/script.php";
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/style.css">
    <title>Document</title>
</head>

<body>
<?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-info alert-dismissible fade show">
            <!-- <strong>Success!</strong> -->
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
        </div>
<?php endif ?>
    <a href="../php/logOut.php"><img src="../image/logOut.png" alt="log_out" width="60" height="50" style="position: absolute; top:0; right:0; margin:1.5em;"></a>
    <div class="pro">
        <label for="file" id="progressName" value="50"></label>
        <div id="progresser"></div>
        <img src="../image/php-g26a9a3b39_1920-removebg-preview.png" alt="logo" width="150" height="100">
        <div class="score" id="score">''</div>
    </div>
    <div class="main">
    <div class="best" id="best" style="color: white;">
    <div><img src="../image/score.png" alt="score" width="100" height="80"><span style="font-size: 60px;"><?=$_SESSION['bestScore'] ?></span></div> 
                <pre>
        1- You will have only <span>30 seconds</span> per each question.

          2- Once you select your answer, you can't reselect.

         3- You can't select any option once time goes off.

            4- You can't exit from the Quiz while you're playing.

                 5- You'll get points on the basis of your correct answers.
                </pre>
    </div>
        <div class="timer hide" id="timer"></div>
        <div class="star hide" id="star">
              <div class="filler" id="filler"> </div>
              <div class="flex">
              <img src="../image/star.png" alt="star" class="img" width="80" height="70" >
              <img src="../image/star.png" alt="star" class="img" width="80" height="70" >
              <img src="../image/star.png" alt="star" class="img" width="80" height="70" >
              <img src="../image/star.png" alt="star" class="img" width="80" height="70" >
              <img src="../image/star.png" alt="star" class="img" width="80" height="70" >
              </div>
        </div>
        <div id="container" class="container hide">
            <h3 id="question"></h3>
            <div id="reponse" class="reponse">
            </div>
        </div>
        <br>
        <div class="controls">
        <button id="end" class="next-btn btn hide" userId="<?=$_SESSION['id']?>" Score="">end</button>
            <button id="next" class="next-btn btn hide">next</button>
            <button id="start" class="start-btn btn " style="background-color: black;">start</button>
        </div>
    </div>
    <script src="../asset/script.js"></script>
</body>

</html>
<?php 
}else{
    $_SESSION['message']="you need to log in first";
    header("Location: http://localhost/quizz/view/index.php");
}
?>