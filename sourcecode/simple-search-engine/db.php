<?php
	$con = mysqli_connect("localhost","root","","search_enegine");
	if (mysqli_connect_errno()){
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  die();
	  }
?>