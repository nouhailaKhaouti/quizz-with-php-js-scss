<?php 
include_once "../php/script.php";
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

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="../php/script.php">
        <h3>Login Here</h3>
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
        <label for="username">Username</label>
        <input type="text" placeholder="User name" id="userName" name="userName">

        <label for="email">Email</label>
        <input type="email" placeholder="email" id="email" name="email">

        <button class="button" name="login">Log In</button>
    </form>

</body>

</html>