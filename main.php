<?php session_start();

  include 'function/connect.php';
  include 'function/functions.php';

if(!isset($_SESSION['user_name']))
{
    header('Location: index.php');
}
else {
  # code...
  if (!isset($_SESSION['trans_id']))
  {
    $_SESSION['trans_id']= gen_tran_id();
    set_trans($_SESSION['user_id'],$_SESSION['trans_id']);
  }

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

    <div class="navbar fixed navbar-inverse ischanged navbar-fixed-top ">
      <!-- icon menu -->
      <div class="menu_icon ">
        <i class="fa fa-list-ul fa-3x icon " aria-hidden="true"></i>

      </div>


      <!--cast menu  -->
      <div class="cart_icon icon">
        <a href="function/pay.php"><i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i></a>
        <p class="text">Cart</p>
      </div>
      <!-- Icon of shop -->
      <div class="logo">
        <img src="images/logo.png" id="home">
      </div>
    </div>
    <div class="menu_bar">
    <div id="cls_bt" style="
                            color: white;
                            float: right;
                            padding-right: 15px;
                            /* padding-bottom: 5px; */
                            height: 25px;
                            /* padding-top: 0px; */
                            align-items: center;
                        ">
        <i class="fa fa-times lg icon "  aria-hidden="true"></i>
      </div>
      <div class="menu_content">
        <a href="#" id="calatog_list"> COLLECTION </a>
        <div class="calatog_list" style="display: none;">
          <?php get_catalog_items(); ?>
        </div>

        <a href="#">CONTACT US </a>
        <a href="#"> PORTFORLIO </a>


        <a href="#" id="login_form">User control panel </a>
        <div id="login">
          <div class="login_form">
        <!-- login function -->
            <div class="user_info">
              <h5> <?php
                echo "User name: ".$_SESSION['user_name'];
               ?>
             </h5>
             <div class="btn-group" role="group">
             <button type="button" class="btn btn-default" onclick="window.location.href='function/register.php'">Control panel</button>
             <button type="button" class="btn btn-default" onclick="window.location.href='function/logout.php'">Logout</button>
           </div>
           </div>
        </div>
      </div>
        <!-- login form -->


      </div>
    </div>


    <!-- -------------------------------div content---------------------------------------------- -->
<!--     <input type="button" id="test" value="test"> </input> -->

    <div class="container main_body" id="content" >
      <?php index_logo(); ?>
    </div>


<?php var_dump($_SESSION) ?>

<div id="checked">

</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="bootstrap.3.3.7\content\Scripts\bootstrap.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="script\jquery.js" type="text/javascript"></script>
    <script>jQuery.noConflict();</script>

  </body>
</html>
