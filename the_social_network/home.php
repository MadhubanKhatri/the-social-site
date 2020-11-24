<?php
include 'connection.php';
include 'home.html';
error_reporting(0);
?>

<center>
<div class="card my-3 mx-5 px-4 py-4" style="width: 38rem; border:1px solid black;">
<?php
$row_query = 'select * from posts';
$row_data = mysqli_query($conn, $row_query);
$row = mysqli_num_rows($row_data);

if ($row!=0)
{
	# Real code...

for ($i=100; $i >=1 ; $i--)
{ 
	$get_data_query = "SELECT img_name,caption, date FROM posts WHERE id=$i";
	$data = mysqli_query($conn,$get_data_query);
	$result = mysqli_fetch_assoc($data);
	$img_name = $result['img_name'];
	$caption = $result['caption'];
	$date = $result['date'];
	$folder = "fb_images/".$img_name;
	if ($img_name) {
		
		echo "<img src='$folder' alt='NULL' class='card-img-top' style='width: 500px; height:500px;'>";
		echo "<div class='card-body'>";
		echo "<p class='card-text'>".$caption."</p>";
		echo "<a href='$folder'>View Full Size</a>";
		echo "<p class='card-text' style='color:darkgrey;'>".$date."</p>";
		echo "<a href='delete_image.php?id_num=$i' class='btn btn-primary' style='float:left;'>Delete</a>";
		echo "</div>";
		echo "<hr>";
		
	}
	
	
	
}

}
else
{
	echo "<div class='container'><h1>No Posts yet.</h1></div>";
}

?>
</div>
</center>