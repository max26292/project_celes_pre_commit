<?php
/**
 *
 */
class user
{
  private  $user_email;
  private $user_name;
  private $user_pass;
  private   $user_add;
  private   $user_phone;
  private $user_id;
  private $user_role;
  function __construct()
  {
    $user_id="";
    $user_email="";
    $user_name="";
    $user_pass="";
    $user_add="";
    $user_phone="";
  }
  public function get_user($mail)
  {
    require 'connect.php';
    $query = 'select * from web_user where user_email = "'.$mail.'"';
 	  $data = $conn->query($query);
    $row = $data->fetch_assoc();
    $this->user_id = $row['user_id'];
    $this->user_name=$row['user_name'];
    $this->user_email =$row['user_email'];
    $this->user_phone=$row['user_phone'];
    $this->user_add=$row['user_address'];
    $this->user_role=$row['user_role'];
    $conn->close();
  }
  public function set_mail($mail)
  {
    $this->user_email = $mail;
  }
  public function get_mail()
  {
    return $this->user_email;
  }
  public function set_name($name)
  {
    $this->user_name = $name;
  }
  public function get_name()
  {
     return $this->user_name ;
  }
  public function set_pass($pass)
  {
    $this->user_pass = $pass;
  }
  public function set_add($add)
  {
    $this->user_add =  $add;
  }
  public function get_add()
  {
      return $this->user_add ;
  }
  public function get_id()
  {
      return $this->user_id ;
  }
  public function get_role()
  {
      return $this->user_role ;
  }
  public function set_phone($phone)
  {
    $this->user_phone =  $phone;
  }
  public function get_phone()
  {
    return $this->user_phone ;
  }
  public function add_user()
  {
    require('connect.php');
    $query = "INSERT INTO `web_user` values ('','$this->user_name', '$this->user_email', '$this->user_phone', '$this->user_add', '$this->user_pass','member')";
    if($conn->query($query)===true)
    {
        echo "<script type='text/javascript'>alert('Register success');</script>";
        header("location: ../index.php");
    }
  }
  public function test() {
       var_dump(get_object_vars($this));
   }
   public function check_var()
   {
     # code...
     if($user_email=""||$user_name=""||$user_pass=""||$user_add=""||$user_phone="")
     {
       return false;
     }
     else {
       return true;
     }
   }
   public function valid_mail($mail)
   {
     # code...
     require 'connect.php';
     $query = 'select * from web_user where user_email = "'.$mail.'"';
     $data = $conn->query($query);
     //$rows = $data->num_rows;
     if($data->num_rows>0)
     {
        return false;
      }
      else {
        return true;
      }
        $conn->close();
    }

}
/**
 *
 */
class order
{
  public $order_id;
  public $product_id;
  public $orders_qty;
  public $orders_amount;

  public function get_order_list($user_id)
  {
    $query = 'select * from transactions where user_id='.$user_id.' and status=0';
    require "connect.php";
    $data= $conn->query($query);
    if(!empty($data))
    {
      // echo "<table>";
      while($row = $data->fetch_assoc())
      {
        // echo $row['trans_id'];
        $query = 'select * from orders where trans_id="'.$row['trans_id'].'"';
        $data_orders = $conn->query($query);
        while($row_orders = $data_orders->fetch_assoc())
        {
          $order_id = $row_orders['orders_id'];
          $product_id = $row_orders['product_id'];
          $orders_qty  = $row_orders['orders_qty'];
          $orders_amount = $row_orders['orders_amount'];
          echo  '<tr>';


          echo '<td>';
          echo $this->get_product_name($product_id);
          // echo $orders_qty ."<br>" ;
          echo '</td>';
          echo '<td>';
          echo $orders_qty;
          // echo $product_id ."<br>" ;
          echo '</td>';
          echo '<td>';
          echo $orders_amount;
          echo '</td>';
          echo '<td> <button type="button" class="btn btn-danger">Hủy</button></td>';
          echo '</tr>';
        }
      }
      // echo "</table>";
    }
    else {
      echo '<h5> Bạn chưa đặt sản phẩm nào</h5>';
    }
  }
  public function get_product_name($product_id)
  {
    $query = 'select product_name from product where product_id="'.$product_id.'"';
    require "connect.php";
    $data= $conn->query($query);
    $row = $data->fetch_assoc();
    return $row['product_name'];
  }
}





 ?>
