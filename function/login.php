<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
    <title></title>

    <!-- Bootstrap -->
    <link href="../bootstrap.3.3.7/content/Content/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/custom_ver1.css">
    <link rel="stylesheet" href="../css/imagehover.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      include 'functions.php';
      include 'class.php';
    ?>
    <div class="navbar fixed navbar-inverse ischanged navbar-fixed-top ">


      <!-- Icon of shop -->
      <div class="logo">
        <img src="../images/logo.png" id="home_reg">
      </div>
    </div>
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
      echo $pass;
      $pass = md5($pass);
      if(login_checked($mail,$pass) == true)
      {
        //
        $user->get_user($mail);
        $_SESSION['user_name']=$user->get_name();
        $_SESSION['user_mail']=$user->get_mail();
        $_SESSION['user_id']=$user->get_id();
        $_SESSION['user_role']=$user->get_role();
        header('Location: ../main.php');
      }
      else{
        $message ="Wrong email or password";
        echo $message;
      }


    }

     ?>

    <div class="container">
      <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          <div class="login_form">
            <form  method="post">
              <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="user_mail"class="form-control"  placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="user_pass" class="form-control"  placeholder="Password">
              </div>
              <input type="submit" name="login" class="btn btn-default" value="Login"/>
              <button type="button" class="btn btn-default" onclick="window.location.href='register.php'">Register</button>

            </form>

          </div>
        </div>
        <div class="col-md-4">

        </div>
      </div>

      <!-- login form -->




  </div>



<!--     <input type="button" id="test" value="test"> </input> -->
<?php
// var_dump($message);
// if(isset($alert)&& $error<>"")
// {
//   echo "<script type='text/javascript'>alert('.$alert.');</script>";
// }
 ?>

<?php

// echo "test function here\n";
// echo "<br>";
// echo $check;
// //$user->test();
// // echo $user->test();
 $_POST = array();
//   if($check == 1)
//   {
//     unset($user);
//     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:90/web_raw/function/register.php">';
//     exit;
//   }
ob_end_flush();

 ?>







    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="..\bootstrap.3.3.7\content\Scripts\bootstrap.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="..\script\jquery.js" type="text/javascript"></script>

  </body>
</html>
