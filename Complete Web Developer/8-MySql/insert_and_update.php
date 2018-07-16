<?php

	$link = mysqli_connect("shareddb-i.hosting.stackcp.net","mosaic-33377749","CC@pc4824","mosaic-33377749");

	if (mysqli_connect_error()){

		die("There was an error conencting to the database");
	}

	//$query = "INSERT INTO `users` (`email`,`password`) VALUES('algernon@gmail.com','algaeisGreen')";


	$query="UPDATE `users` SET password ='hardtimes06' WHERE email='pmcirin45@gmail.com' LIMIT 1";

	mysqli_query($link, $query);

	$query ='SELECT * FROM users';

	if ($result=mysqli_query($link,$query)){
		$row = mysqli_fetch_array($result);
		echo "My email is ".$row['email']."<br>"."My password is ".$row['password'].".";
	}


?>