<?php
	function saveimage ($name_product,$image){
			include 'connect.php';
			$query = "update product set product_image ='$image' where product_name = '$name_product'";
			// $query = "select * from product where product_name = '$name_product'";

			  $conn->query($query);
			// while( $row = $data->fetch_assoc())
			// {
			// 	echo $row['product_name'];
			// }
			$conn->close();
		}
	// display image code: <img height="200" width="200" src="data:image;base64,'.row['*nameof_image_colum'].">
	function get_catalog_items ()
	{
		include "connect.php";
		$query =  "select catalog_id,catalog_name from catalog";
		$data = $conn->query($query);
		if( $data->num_rows >0)
		{
			while ($row = $data->fetch_assoc()) {
				# code...?>

				<a href="#" class="list-group-item" <?php echo 'id="'.$row['catalog_name'].'"' ;?>  ><?php echo $row['catalog_name'];  ?></a>

			<?php
			}

		}
	}


	function get_product_items($cata_id)
	{
		include "connect.php";
		$query = "select product_id, product_name, product_price, product_content, product_image from product where catalog_id=".$cata_id."";
		$data = $conn->query($query);
		//var_dump($data);
		// $results = array();
		$row_count = 0;
		$a =  $data->num_rows ;
		$a  = $a/6;
		$a = ceil($a);
		if($data->num_rows >0)
		{
			?>
			<div class="row row_space">
			<?php
			while ($row =  $data->fetch_assoc())
			{
				# code...

				?>


				<div class="col-xs-12 col-lg-4">
					<figure class="imghvr-fade">
					  <img class="product_img" src='data:image;base64,<?php echo $row["product_image"];?>'>
					  <figcaption>
					   	<h1><?php echo $row['product_name'] ?></h1>
					   	<h3><?php echo $row['product_price']; ?></h3>
					   	<p><?php echo $row['product_content'] ?></p>
					  </figcaption>
					</figure>

					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#my_<?php echo $row['product_id']; ?>" >
					  Bấm để mua ngay điện thoại này
					</button>

					<!-- Modal -->
					<div class="modal fade" id="my_<?php echo $row['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Mua</h4>
					      </div>
					      <div class="modal-body" id="product_ordered">
					        <div class="container-fluid">
					        	<div class="col-xs-6">
					        		 <img width="200px" height="250px" src='data:image;base64,<?php echo $row["product_image"];?>'>
					        	</div>
					        	<div class="col-xs-6">
					        		<h1><?php echo $row['product_name'] ?></h1>
								   	<h3><?php echo $row['product_price']; ?></h3>
								   	<p><?php echo $row['product_content'] ?></p>
					        	</div>
					        </div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" onclick="test('<?php echo $row['product_id']; ?>')">Thêm vào giỏ hàng</button>


					        <button type="button" class="btn btn-primary" onclick="window.location.href='function/pay.php'">Thanh toán</button>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			<?php $row_count += 1;
				if ($row_count == 3)
				{
					?>
					</div>
					<div class= "row">

					<?php
					$row_count = 0;
				}
			}
				?>

			</div>

			<!-- <div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-1"></div>
				<div class="col-md-1"></div>
				<div class="col-md-1">
					<a href="index.php?page=previous"><i class="fa fa-chevron-left fa-5x" aria-hidden="true"></i></a>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-1"></div>
				<div class="col-md-1"></div>

				<div class="col-md-1">
					<a href="index.php?page=next"><i class="fa fa-chevron-right fa-5x" aria-hidden="true"></i></a>
				</div>


			</div> -->

	<?php

		}
		//var_dump($data);
		//var_dump($results);
		// echo json_encode($results);
	}

	// load logo of product on load --------------------------------------------------------------------
	// -----------------------------------------------------------------------------
	function index_logo()
	{
		?>
		<div class="row">
			<div class="col-md-4 logo_img">
			<img src="images/logoapple.png"  width="250px" height="250px" id="Iphone_index" >
			</div>
			<div class="col-md-4 logo_img">
				<img src="images/logoasus.png"  width="250px" height="250px" id="ASUS_index" >
			</div>
			<div class="col-md-4 logo_img">
				<img src="images/logohtc.png"  width="250px" height="250px" id="HTC_index" >
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 logo_img">
			<img src="images/logooppo.png"  width="250px" height="250px" id="OPPO_index" >
			</div>
			<div class="col-md-4 logo_img">
				<img src="images/logosamsung.png"  width="250px" height="250px" id="Samsung_index" >
			</div>
			<div class="col-md-4 logo_img">
				<img src="images/logoxiaomi.png"  width="250px" height="250px" id="Xiaomi_index">
			</div>
		</div>

		<?php
	}

	function login_checked($mail,$pass)
	{
		 require 'connect.php';
		 $query = 'select * from web_user where user_email = "'.$mail.'" and user_password="'.$pass.'"';
		 $data = $conn->query($query);
		 //$rows = $data->num_rows;
		 if($data->num_rows>0)
		 {
				return true;
			}
			else {
				return false;
			}
	}
	function RandomString()
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	function gen_tran_id()
	{
		# code...
		require_once 'functions.php';
		require 'connect.php';
		again:
		$temp = RandomString();
		$query = 'select * from transitions where trans_id = "'.$temp.'"';
		$data = $conn->query($query);
		if(!empty($data) )
		{
			goto again;
		}
		else {
			# code...
			return $temp;
		}
	}
	function close_trans($trans_id)
	{
		$query = 'UPDATE transactions SET status=1 where trans_id="'.$tran_id.'"';
		require_once ('connect.php');
		$conn->query($query);
		$conn->close();
	}
	function set_trans($user_id,$trans_id)
	{
		$query =  'INSERT INTO transactions (trans_id, status, user_id) VALUES ("'.$trans_id.'",0,'.$user_id.')';
		require ('connect.php');
		$conn->query($query);
		$conn->close();
	}
	function gen_order_id($trans_id)
	{
		# code...
		require_once 'functions.php';
		require 'connect.php';
		again:
		$temp = RandomString();
		$query = 'select * from ordres where trans_id = "'.$trans_id.'" and orders_id="'.$temp.'"';
		$data = $conn->query($query);
		if(!empty($data) )
		{
			goto again;
		}
		else {
			# code...
			return $temp;
		}
		$conn->close();
	}
	function get_price($pro_id)
	{
		$query = 'select product_price from product where product_id="'.$pro_id.'"';
		require 'connect.php';
		$data = $conn->query($query);
		$row = $data->fetch_assoc();
		return $row['product_price'];
	}
	
// -------------------------------testing function --------------------------\

// ------------------------------- addion function --------------------------
if(isset($_POST['cata_id'])){
	//var_dump($_POST);
	echo get_product_items($_POST['cata_id']);
}
 ?>
