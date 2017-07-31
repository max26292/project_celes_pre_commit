<?php session_start();
if(isset($_SESSION['user_name']))
{
    header('Location: main.php');
}



 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
    <title></title>

    <!-- Bootstrap -->
    <link href="bootstrap.3.3.7/content/Content/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom_ver1.css">
    <link rel="stylesheet" href="css/imagehover.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      // include 'function/connect.php';
      include 'function/functions.php';
      include 'function/class.php'
    ?>
    <div class="navbar fixed navbar-inverse ischanged navbar-fixed-top ">
      <!-- icon menu -->
      <div class="menu_icon ">
        <i class="fa fa-list-ul fa-3x icon " aria-hidden="true"></i>

      </div>


      <!--cast menu  -->
      <div class="cart_icon icon">
        <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
        <p class="text">Cart</p>
      </div>
      <!-- Icon of shop -->
      <div class="logo">
        <img src="images/logo.png" id="home">
      </div>
    </div>
    <div class="menu_bar">
    <!-- <div id="cls_bt" style="
                            float: right;
                            padding-right: 15px;
                            /* padding-bottom: 5px; */
                            height: 25px;
                            /* padding-top: 0px; */
                            align-items: center;
                        ">
        <i class="fa fa-times lg icon "  aria-hidden="true"></i>
      </div>  -->
      <div class="menu_content">
        <a href="#" id="calatog_list"> COLLECTION </a>
        <div class="calatog_list" style="display: none;">
          <?php get_catalog_items(); ?>
        </div>

        <a href="#">CONTACT US </a>
        <a href="#"> PORTFORLIO </a>

        <a href="#" id="login_form">LOGIN </a>

        <!-- login function -->
        <?php

        $user= new user();
        $message="";
        if(isset($_POST['login']) && empty($_POST['user_mail'])&& empty($_POST['user_pass']))
        {
          $message = "Please enter email and Password!!";
        }

        if(isset($_POST['login']) && !empty($_POST['user_mail']) && !empty($_POST['user_pass']))
        {
          $mail = $_POST['user_mail'];
          $pass = $_POST['user_pass'];
          // echo $pass;
          $pass = md5($pass);
          if(login_checked($mail,$pass) == true)
          {
            //
            $user->get_user($mail);
            $_SESSION['user_name']=$user->get_name();
            $_SESSION['user_mail']=$user->get_mail();
            $_SESSION['user_id']=$user->get_id();
            $_SESSION['user_role']=$user->get_role();
            header('Location: main.php');
          }
          else{
            $message ="Wrong email or password";

          }


        }

         ?>

        <!-- login form -->
        <div id="login">
          <div class="login_form">
            <form  method="post">
              <div class="error-message-box"><?php if(isset($message)) { echo $message; } ?></div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="user_mail"class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="user_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <input type="submit" name="login" class="btn btn-default" value="Login"/>
              <button type="button" class="btn btn-default" onclick="window.location.href='function/register.php'">Register</button>

            </form>

          </div>
        </div>

      </div>
    </div>


    <!-- -------------------------------div content---------------------------------------------- -->
<!--     <input type="button" id="test" value="test"> </input> -->
  <?php
  if(isset($alert)&& $error<>"")
  {
    echo "<script type='text/javascript'>alert('.$alert.');</script>";
  }
   ?>
    <div class="container main_body" id="content" >
      <?php index_logo(); ?>
    </div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="bootstrap.3.3.7\content\Scripts\bootstrap.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="script\jquery.js" type="text/javascript"></script>

  </body>
</html>
