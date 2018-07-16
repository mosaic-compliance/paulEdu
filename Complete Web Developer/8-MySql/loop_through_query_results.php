<?php

	$link = mysqli_connect("shareddb-i.hosting.stackcp.net","mosaic-33377749","CC@pc4824","mosaic-33377749");

	if (mysqli_connect_error()){

		die("There was an error conencting to the database");
	}

	$name = "Paul McGovern";

	$query="SELECT `email` FROM `users` WHERE name ='".mysqli_real_escape_string($link,$name)."'";

	mysqli_query($link, $query);


	if ($result=mysqli_query($link,$query)){

		while ($row = mysqli_fetch_array($result)) {

		print_r($row);

		}


	}


?>