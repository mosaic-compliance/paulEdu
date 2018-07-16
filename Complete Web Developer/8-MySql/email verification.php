<?php

	$link = mysqli_connect("shareddb-i.hosting.stackcp.net","mosaic-33377749","CC@pc4824","mosaic-33377749");

	if (mysqli_connect_error()){

		die("There was an error conencting to the database");
	}
$errorMessage ="";
$successMessage="";
if ($_GET) {
	$email= $_GET['email'];
	$pw=$_GET['password'];
	$errorMessage ="";
	$successMessage="";
	$error="";

	if ($pw=="") {
		$error =$error."Please enter a password.";
	}
	if ($email=="") {
		$error="Please enter an email address. <br>";
	}else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				//query users by entered email to see if it turns up null result
			$query = "SELECT `email` FROM users WHERE email='".mysqli_real_escape_string($link,$email)."'";

			$result=mysqli_query($link,$query);

			if(mysqli_num_rows($result)>0){
				$errorMessage='<div class ="alert alert-danger" role="alert">The email addresss you entered is already registered.</div>';

			}else{
				$query = "INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($link,$email)."','".mysqli_real_escape_string($link,$pw)."')";

				$successMessage ='<div class="alert alert-success" role="alert">Thank you for signing up!</div>';

				mysqli_query($link, $query);


			}
		
	}else{
		$error="Please enter a valid email address. <br>";
	}


	if ($error<>"") {
		$errorMessage ='<div class ="alert alert-danger" role="alert">'.$error.'</div>';
	} 
}







?>


<!DOCTYPE html>
	<html>
	<head>

		<meta charset="utf-8">
	    
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	    <script type = "text/javascript" src="jquery.min.js"></script>
	        
	    <script src="/Paul/Complete Web Developer/4-jquery/jquery-ui/jquery-ui.js"></script>

	    <link href="/Paul/Complete Web Developer/4-jquery/jquery-ui/jquery-ui.css" rel="stylesheet">




		<title>Sign Up</title>
	</head>
	<body>
		<div class="container">
			<form>

				<div class = "form-group">
					<label for="email">Enter Email Address</label>
					<input type="email" class = "form-control"  name="email" id="email" placeholder="email@xyz.com">
				</div>
				<div class = "form-group">
					<label for ="password"> Enter Password</label>
					<input type="password" class = "form-control" name="password" id ="password" placeholder="password">
				</div>

					<button class="btn btn-primary" name="submit">Create Account</button>
			</form>
			<div id="message">
				<?php
				echo $errorMessage.$successMessage

				?>


			</div>
		</div>










		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>