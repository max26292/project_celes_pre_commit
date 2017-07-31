

<?php

$host = 'localhost';
$db = 'web_pm';
$user = 'max26292';
$pw = 'h260292';


$conn = new mysqli($host, $user, $pw, $db);
mysqli_set_charset($conn, 'UTF8');
// if ($conn->connect_errno == 0) {
//   echo "Connection successful!";
// } else {
//   echo $conn->connect_errno;
// }
//  $query = "select * from product";
// $result = $conn->query($query);
// if (mysqli_num_rows($result)>0) {
// 	# code...
// 	while ($row = $result->fetch_assoc())
//  		{
//  			$product_name = $row['product_name'];
//  			echo $product_name."\n";

// 		}
//  }
if ($conn->connect_errno) {
  die('Sorry we couldn\'t connect to the database');
}
?>
