<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.css" integrity="sha512-M9yHeAbo9J8KSZVvOi5PEo4WrL6LWxbS+cvh6faIEPPqHQXhxilgCSJ/L2tTqRf73GmI4+tNy8OWSsQuwXc4fw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="./assets/css/icon/all.min.css">
  <link rel="stylesheet" href="./assets/css/layout.css">
  <link rel="stylesheet" href="./assets/css/homePage.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <link rel="stylesheet" href="./assets/css/category.css">
  <script src="./assets/js/jquery_3.6.0.js"></script>
  <title>Document</title>
</head>
<body>
  <?php
    if(!isset($_SESSION['username'])){     
        require('./template/login_form.php');
    }
    else {
      require('./template/layout.php');
    }
  ?>
  <script src="./assets/js/scriptLogin.js"></script>
</body>
</html>
