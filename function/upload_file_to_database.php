
<?php 
include 'connect.php'; 
include 'functions.php';
?>


<form  method="post" enctype="multipart/form-data">
	<input type="file" name="product_image"/>
	<br>
	<select name="product_name">
		<<option value="...">..............</option>}
		option		
		<?php 
		$query = "select product_name from product";
		$data =  $conn->query($query);
		while( $row = $data->fetch_assoc())
		{	?>
		<option value="<?php echo $row['product_name'] ?>"><?php echo $row['product_name'] ?></option>

		<?php }
		//$conn->close();
	 ?>		
	</select>
	
	<br>
	<input type="submit" name="submit_product_image" value="upload_product_image">
	<?php 
		if (isset($_POST['submit_product_image'])) {
			# code...
			if (getimagesize($_FILES['product_image']['tmp_name'])==FALSE) {
				echo "Please select an image";
			}
			else 
			{
				$image = addslashes($_FILES['product_image']['tmp_name']);
				$name_image = addslashes($_FILES['product_image']['tmp_name']);
				$name_product = $_POST["product_name"];
				// echo $name_product;
				$image = file_get_contents($image);
				$image = base64_encode($image);
			}
			saveimage($name_product,$image);
		}
		
	 ?>
</form>

<?php 
		$query = "select * from product where catalog_id = 2";
		$data =  $conn->query($query);
		while( $row = $data->fetch_assoc())
		{
			?>
			<img height='200' width='200' src='data:image;base64,<?php echo $row["product_image"];?>'>
		<br>
<?php  
		}

		$conn->close();
?>