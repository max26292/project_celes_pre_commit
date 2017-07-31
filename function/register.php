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
      $user = new user();

      $message="";
      $error ="";
        if(isset($_POST['register_bt']) && empty($_POST['reg_user_email']))
        {
          $message = "Please type email";
        }

        if(isset($_POST['register_bt']) && !empty($_POST['reg_user_email']) && !empty($_POST['reg_user_pass'])
        && !empty($_POST['reg_user_re_pass']) &&  !empty($_POST['reg_user_name']) && !empty($_POST['reg_user_address'])
        && !empty($_POST['reg_user_phone']))
        {

          if(isset($_POST['reg_user_email']))
          {
            $user_email= $_POST['reg_user_email'];
            // echo $user_email;
            if($user->valid_mail($user_email)== true)
            {
              $user->set_mail($user_email);
            }
            else {
              $message = "This email exists";
              goto end;
            }
          }
          if(isset($_POST['reg_user_pass']) && isset($_POST['reg_user_re_pass']) )
          {
            $user_pass = $_POST['reg_user_pass'];
            $user_repass = $_POST['reg_user_re_pass'];
            // echo $user_pass;
            if($user_pass <> $user_repass)
            {
                $message = "Password and Rety Password aren't correct";
                goto end;
              // header('Location:'.htmlspecialchars($_SERVER['PHP_SELF'])."?error=1");
            }
            else if (strlen($user_pass<8))
            {
              $message = "Password must have 8 characters"  ;
              goto end;
              // header('Location:'.htmlspecialchars($_SERVER['PHP_SELF'])."?error=2");
            }
            else {
              $user_pass = md5($user_pass);
              $user->set_pass($user_pass);

            }

          }
          if(isset($_POST['reg_user_name']))
          {
            $user_name=$_POST['reg_user_name'];
            // echo $user_name;
            if(strlen($user_name) < 3)
            {
              $message = "Name must have atleat 3 characters.";
              goto end;
              // header('Location:'.htmlspecialchars($_SERVER['PHP_SELF'])."?error=3");
            }
             else if (!preg_match("/^[a-zA-Z ]+$/",$user_name))
             {
               $message ="Name must contain alphabets and space.";
               goto end;
              //  header('Location:'.htmlspecialchars($_SERVER['PHP_SELF'])."?error=4");
             }
             else {
               # code...
               $user->set_name($user_name);

             }
          }
          if(isset($_POST['reg_user_address']))
          {
            $user_add =$_POST['reg_user_address'];
            //  echo $user_add;
            if(strlen($user_add) < 3)
            {
              $message = "Address must have atleat 3 characters.";
              goto end;
              // header('Location:'.htmlspecialchars($_SERVER['PHP_SELF'])."?error=5");
            }
            //  else if (!preg_match("/^[a-zA-Z ]+$/",$user_add))
            //  {
            //    header('Location: http://localhost:90/web_raw/function/register.php?error=6');
            //  }
            else {
              # code...

                $user->set_add($user_add);
            }

          }
          if(isset($_POST['reg_user_phone']))
          {
            $user_phone =$_POST['reg_user_phone'];
            // echo $user_phone;
            $user->set_phone($user_phone);

          }
          if($user->check_var() == true)
          {
            $user->add_user();
          }


      }
      // if(isset($_GET['error']))
      // {
      //   $error = $_GET['error'];
      //   if($error==1)
      //   {
      //    ;
      //   }
      //   else if($error==2)
      //   {
      //
      //   }
      //   else if($error==3)
      //   {
      //      ;
      //   }
      //   else if($error==4)
      //   {
      //     $message ="Name must contain alphabets and space.";
      //   }
      //   else if($error==5)
      //   {
      //     ;
      //   }
      //   else if($error==6)
      //   {
      //     $message ="Address must contain alphabets and space.";
      //   }
      //   else if($error== 0) {
      //     # code...
      //       $message = "Register Successfully";
      //
      //   }
      // }
      //

end:
     ?>
    <div class="container">

      <form  id="regis_form" method="post">
        <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
        <div class="form-group">
         <label for="exampleInputEmail1">Email address</label>
         <input type="email" class="form-control" name="reg_user_email" placeholder="Email">
       </div>
       <div class="form-group">
         <label >Password</label>
         <input type="password" class="form-control" name="reg_user_pass" placeholder="Password">
       </div>
       <div class="form-group">
         <label >Retype Password</label>
         <input type="password" class="form-control" name="reg_user_re_pass" placeholder="Retype Password">
       </div>
       <div class="form-group">
         <label >User Name</label>
         <input type="text" class="form-control" name="reg_user_name" placeholder="User Name">
       </div>
       <div class="form-group">
         <label >Address</label>
         <input type="text" class="form-control" name="reg_user_address" placeholder="Adress">
       </div>
       <div class="form-group">
         <label >Phone Number</label>
         <input type="number" class="form-control" name="reg_user_phone" placeholder="Phone Number">
       </div>
       <div class="modal-footer">
         <input type="submit"  name="register_bt" class="btn btn-primary" value="Đăng kí"/>
         <input type="button" id="register_bt_clr" name="register_bt" class="btn btn-primary" value="Reset"/>
       </div>
      </form>

    </div>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="bootstrap.3.3.7\content\Scripts\bootstrap.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="..\script\jquery.js" type="text/javascript"></script>

  </body>
</html>
