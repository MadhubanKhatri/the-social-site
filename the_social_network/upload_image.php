<?php
include 'connection.php';
error_reporting(0);
if (isset($_FILES['img_file'])) {
	$file_name = $_FILES['img_file']['name'];
	$file_tmp = $_FILES['img_file']['tmp_name'];
	$caption = $_POST['caption'];
	$date = date("Y-m-d");
	list($width, $height) = getimagesize($file_tmp); 
	

	
	$moveFile = move_uploaded_file($file_tmp, 'fb_images/'.$file_name);

	if ($moveFile==1) {
		if ($height>=1000) 
		{
			$query = "INSERT INTO posts (img_name,caption,date) VALUES ('$file_name','$caption', '$date')";
			$data = mysqli_query($conn,$query);
		
		
			if ($data)
			{

				echo "<script>alert('Image Inserted.')</script>";
			}
			else
			{
				echo "<br>Image is not inserted";
			}

		}
		else
		{
			echo "<script>alert('Image size is not valid.')</script>";
		}
	}
	else
	{
		echo "No Upload. Please Select File.";
	}

}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.container
	{
		width: 600px;
		position: absolute;
		top: 100px;
		left: 400px;
		border: 2px solid;
		padding: 20px;
	}
	label
	{
		font-family: sans-serif;
		font-size: 25px;
		background-color: dodgerblue;
		padding: 10px;
		color: white;
	}
	.file
	{
		font-size: 30px;
		display: none;
	}
	.caption
	{
		width: 100%;
		height: 200px;
		font-size: 25px;
		font-family: sans-serif;
	}
	input[type='submit']
	{
		padding: 15px;
		background-color: dodgerblue;
		color: white;
		border:none;
		font-size:20px;
	}
	a
	{
		float: left;
		font-size: 25px;
		text-decoration: none;
		background-color: grey;
		color: white;
		font-family: sans-serif;
		padding: 10px;
	}
</style>
<div class="container">
	<a href="home.php">&#8592; Back</a>
	<br><br><br><br>
<form action="" method="POST" enctype="multipart/form-data">
	<label for="file"><i class="fa fa-upload"></i> Select Image</label><br><br>
	<input type="file" name="img_file" class="file" id="file">
	<textarea placeholder="Caption" name="caption" class="caption"></textarea><br><br>
	<input type="submit" value="Upload">

</form>
</div>
