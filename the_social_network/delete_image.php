<?php
include 'connection.php';
$img_id = $_GET['id_num'];
$query = "DELETE FROM POSTS WHERE id=$img_id";
$data = mysqli_query($conn, $query);


if ($data)
{
	header("location: home.php");
}
else
{
	echo "Can not be Deleted";
}
?>

