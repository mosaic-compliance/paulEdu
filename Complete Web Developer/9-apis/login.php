<?php
	session_start();
	$error="";
	$errorMessage="";
	if ($_POST){	
	$link = mysqli_connect("shareddb-i.hosting.stackcp.net","mosaic-33377749","CC@pc4824","mosaic-33377749");
		if (mysqli_connect_error()){

		die("There was an error conencting to the database");
	}

	if (isset($_POST['newemail']) AND isset($_POST['newpassword']) AND isset($_POST["cbSignUp"])){


		$newEmail=$_POST['newemail'];

		if(filter_var($newEmail, FILTER_VALIDATE_EMAIL)==false){

			$error= $error." Please Enter a Valid Email address.<br>";

		}else{
			$newPassword=$_POST['newpassword'];

			if ($newPassword==""){

				$error= $error." Please Enter a Password.<br>";
			} else			
				if($_POST["cbSignUp"]=="on"){
					
					$query = "SELECT `email` FROM `users` WHERE email ='".mysqli_real_escape_string($link,$newEmail)."'";

					$result=mysqli_query($link, $query);

					if (mysqli_num_rows($result)==0) {

					$query = "INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($link,$newEmail)."','".mysqli_real_escape_string($link, $newPassword)."')";

						mysqli_query($link, $query);

						$_SESSION['email'] = $newEmail;
						setcookie("username",$newemail,1440);

						header("Location: session.php");

					} else {
						$errorMessage= '<div class ="alert alert-danger" role="alert">There already exists an account for the email address you entered.</div>';
					}

				}
			}
	}else if (isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST["cbLogin"])){

			$email=$_POST['email'];

			if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){

				$error=$error." Please Enter a Valid Email Address.<br>";

			}else{

				$password=$_POST['password'];

				if ($password=="") {
				$error=$error." Please Enter a password.<br>";
				} else
					if($_POST["cbLogin"]=="on"){
						$query = "SELECT id FROM users WHERE (email = '".mysqli_real_escape_string($link, $email)."' AND password ='".mysqli_real_escape_string($link,$password)."')";
						$results = mysqli_query($link, $query);

						if (mysqli_num_rows($results)>0){
							$_SESSION['email']=$email;
							
							setcookie("username",$email,1440);

							header("Location: session.php");
						}else{
							$errorMessage='<div class ="alert alert-danger" role="alert">Email and password not found.</div>';
						}
					}

			}
		}

		if ($error<>"") {
			$errorMessage='<div class="alert alert-danger" role="alert">'.$error.'<div>';
		}
	}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>


		<meta charset="utf-8">
	    
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	    <script type = "text/javascript" src="/Paul/Complete Web Developer/4-jquery/jquery-ui/jquery.min.js"></script>
	        
	    <script src="/Paul/Complete Web Developer/4-jquery/jquery-ui/jquery-ui.js"></script>

	    <link href="/Paul/Complete Web Developer/4-jquery/jquery-ui/jquery-ui.css" rel="stylesheet">





<style type="text/css">
	form{

		margin:10px;

	}

input[class*="form-control"]{

	margin:10px auto;

	width:45%;

}

#cbLogin,#cbSignUp{
	display: none;


}

*[class*="new"]{
	display: none;

}

*[class*="log"]{
	display:block;
}


#loginBtn{
	margin: 0 auto;
}


body, html{
	height:100%;
	width:100%;

}

.bg{
	height: 100%;
	background-image: url("autumn.jpg");
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;

}

.container{
	padding-top: 30%;

}
a{
	font-size: 120%;
	font-weight: bold;
	color:#FC401B;


}

label{
	color:#FC401B;

}
</style>

</head>
<body>

	<div class ="bg">

	<div class="container text-center">
		<form method="post">

			<div class = "row text-center">
				<input class ="form-control new" type="email" name="newemail" id="newemail" placeholder="Your Email">

				<input class ="form-control log" type="email" name="email" id="email" placeholder="Your Email">

			</div>

			<div class = "row text-center">
				<input class ="form-control new"  type="password" name="newpassword" id="newpassword" placeholder="Password">

				<input class = "form-control log" type="password" name="password" id="password" placeholder="Password" >


			</div>

			<div class = "row text-center">
				<input id = "cbSignUp" type ="checkbox", name = "cbSignUp">

				<input class ="form-control" id = "cbLogin" type ="checkbox", name="cbLogin" checked>
			</div>


			<button id="signUpBtn" class ="btn btn-primary new">Sign Up</button>

			<button id="loginBtn" class = "btn btn-primary log">Log In</button>

			<label for="stayLogged">Stay Logged In</label>
			<input class="form-control" type="checkbox" name="stayLogged" id="stayLogged">
		</form>
			<a href="javascript:void(0);" id="toggleLink">Sign Up</a>
			<div id="error message">
				<?php
					echo $errorMessage;
				?>
			</div>
	</div>
</div>
	


		<script type="text/javascript">

			$("#toggleLink").click(function(){
			var currentState = $("#toggleLink").html()

			if (currentState=="Login") {

				$("#toggleLink").html("Sign Up");

				$("#cbLogin").prop('checked',true);

				$("#cbSignUp").prop('checked',false);

				$("#password").show();

				$("#email").show();

				$("#loginBtn").show();

				$("#newpassword").hide();

				$("#newemail").hide();

				$("#signUpBtn").hide();

			}else if(currentState=="Sign Up"){

				$("#toggleLink").html("Login");

				$("#cbLogin").prop('checked',false);

				$("#cbSignUp").prop('checked',true);

				$("#password").hide();

				$("#email").hide();

				$("#loginBtn").hide();

				$("#newpassword").show();

				$("#newemail").show();

				$("#signUpBtn").show();
			}


			})


		</script>



		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>