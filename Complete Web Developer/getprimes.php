<?php
if ($_GET) {

	$testNumber = $_GET['number'];
	if (is_numeric($testNumber)) {
		if ($testNumber==1) {
			print $testNumber." is prime";
		} else{
		$numFactors = 0;
		$factors = array();
		for ($i=2;$i<$testNumber;$i++){
				 if ($testNumber%$i==0) {
				 	$numFactors=$numFactors+1;
				 	$factors[]=$i;		 	
				 }else if ($i==($testNumber-1)){
						if($numFactors==0) {
							print $testNumber." is prime";
							}else {
							print $testNumber." is not prime <br>".$testNumber." has the following factors:<br>";
							$j=0;
							while($j<sizeof($factors)){
								print $factors[$j]."<br>";
								$j++;
								}
							}
						}

					}
				}
		}else{
		print("Please Enter a whole number");
}
}

?>

<p> Enter a number and click Go to see if it is a prime. </p>

<form>
		<input type="text" name="number">

		<input type="submit" value="GO!">


</form>