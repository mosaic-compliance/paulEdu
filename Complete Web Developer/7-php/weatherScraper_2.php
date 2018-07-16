<?php
	$weatherMessage="London";
	$errorMessage="Wrong";
if (array_key_exists('city', $_GET)) {
	$city=$_GET['city'];
	$city=str_replace(" ","-",$city);
	$weatherMessage="";
	$errorMessage="";
	$file_headers =@get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
	if($city==""){
		$error = "Please Enter the name of a city.";
		$errorMessage= '<div class="alert alert-danger" role="alert" id="errorMessage">'.$error.'</div>';
	}else{



	$forecast =array();


	if ($file_headers[0]=='HTTP/1.1 404 Not Found') {
			$error ="The city name you entered could not be found.";
			$errorMessage= '<div class="alert alert-danger" role="alert" id="errorMessage">'.$error.'</div>';
		
	}else{

			$pagecontent = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
			$html = new DOMDocument();

			libxml_use_internal_errors(TRUE);

			if(!empty($pagecontent)){ 
					$html->loadHTML($pagecontent);
					libxml_clear_errors();
					$weather_xpath = new DOMXPath($html);

					$weather_row = $weather_xpath->query('//span[@class="phrase"]');
					if($weather_row->length > 0){
					foreach($weather_row as $key=> $value){
						
						$forecast[$key]=$value->nodeValue;
					}
					$weatherMessage='<div class="alert alert-success" role="alert" id="successMessage">'.$forecast[0].'</div>';
				}else{

					$error ="The city name you entered could not be found.";
					$errorMessage= '<div class="alert alert-danger" role="alert" id="errorMessage">'.$error.'</div>';

				}

			}
		}
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


	<title>Contact Form</title>
	
	<style type="text/css">
		body,html{
			height:100%;
			width:100%;

		}
		.bg {
			height:100%;
			background-image: url("https://www.setaswall.com/wp-content/uploads/2017/07/Lighthouse-Background-26-2560x1600.jpg");
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;

					}
		.container{
			padding: 10% 10%;
		}
		#message{

			margin-top: 2%;

		}

	</style>

	</head>

	<body>
		<div class="bg">

			<div class="container">
				<h1 class="text-center">Whats the Weather?</h1> 
				<h5 class ="text-center">Enter the name of a city</h5>

				<form>

					<div class="form-group text-center">


						<input type ="text" class="form-control" id = "city" name="city">

					</div>
					<div class="text-center	">
						<button type ="submit" class ="btn btn-primary" id="submit">Submit</button>
					</div>
				</form>


				<div id="message">
					<?php echo $errorMessage.$weatherMessage ?>
				</div>

			</div>
		</div>
	



		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


	</body>
</html>