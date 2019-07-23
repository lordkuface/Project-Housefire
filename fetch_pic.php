<?php
	$con = mysqli_connect('localhost','root','Boros1105','housefiredb');
	if (!$con) {
    	die('Could not connect: ' . mysqli_error($con));
	}


	$sql="SELECT picture FROM bio WHERE name = '".$_GET['q']."'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	print_r($row['picture']);
?>