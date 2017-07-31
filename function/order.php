<?php
session_start();
require 'functions.php';
require 'connect.php';
  if(isset($_POST['pro_id']))
  {
    $product_id = $_POST['pro_id'];
    $orders_qty = 1;
    $price = get_price($product_id);
    $orders_amount = $orders_qty * $price;
    //echo $orders_amount;
    $oder_id = gen_order_id($_SESSION['trans_id']);
    $query = 'INSERT INTO orders(trans_id, orders_id, product_id, orders_qty, orders_amount) VALUES ("'.$_SESSION['trans_id'].'","'.$oder_id.'","'.$product_id.'",'.$orders_qty.','.$orders_amount.')';
    $conn->query($query);
    $conn->close();
  }

// var_dump($_POST);
// var_dump($_SESSION);

 ?>
