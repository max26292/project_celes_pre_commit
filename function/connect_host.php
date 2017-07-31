<?php

$host = 'mysql.hostinger.vn';
$db = 'u173384463_web';
$user = 'u173384463_max26';
$pw = 'h260292';

$conn = new mysqli($host, $user, $pw, $db);

/*if ($conn->connect_errno == 0) {
  echo "Connection successful!";
} else {
  echo $conn->connect_errno;
}*/
/*$query = "select * from product";
$result = $conn->query($query);
if (mysqli_num_rows($result)>0) {
	# code...
	while ($row = $result->fetch_assoc())
		{
			$product_name = $row['product_name'];
			echo $product_name."\n";

		}
}*/
if ($conn->connect_errno) {
  die('Sorry we couldn\'t connect to the database');
}
?>
<?php

$host = 'localhost';
$db = 'web_pm';
$user = 'max';
$pw = 'h260292';

$conn = new mysqli($host, $user, $pw, $db);

/*if ($conn->connect_errno == 0) {
  echo "Connection successful!";
} else {
  echo $conn->connect_errno;
}*/
/*$query = "select * from product";
$result = $conn->query($query);
if (mysqli_num_rows($result)>0) {
	# code...
	while ($row = $result->fetch_assoc())
		{
			$product_name = $row['product_name'];
			echo $product_name."\n";

		}
}*/
if ($conn->connect_errno) {
  die('Sorry we couldn\'t connect to the database');
}
 ?>