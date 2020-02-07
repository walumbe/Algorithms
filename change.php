<?php

	if(isset($_POST['submit'])){

	$amount = $_POST['paid'];
	(int)$coin_val = $_POST['coin_val'];

	rsort($coin_val);
	$n = count($coin_val);
	echo "Return change as follows:";
	echo "<br>";
		for($i = 0; $i < $n; $i++){
		    while ($amount >=  $coin_val[$i])
		    {
		      //while loop is needed since one coin can be used multiple times
		      $amount = $amount - $coin_val[$i];
		      
		      echo $coin_val[$i] . "Ksh  ";
		      echo "<br>";
		    }
		}
	
	}
	 echo "<br>"; 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Value</title>
</head>
<body>

	<form action="change.php" method="POST">
		<input type="number" name="paid" placeholder="Enter the amount paid"><br><br>
		<input type="checkbox" name="coin_val[]" value=1><label>1</label><br/>
		<input type="checkbox" name="coin_val[]" value=5><label>5</label><br/>
		<input type="checkbox" name="coin_val[]" value=10><label>10</label><br/>
		<input type="checkbox" name="coin_val[]" value=20><label>20</label><br/>
		<input type="checkbox" name="coin_val[]" value=40><label>40</label><br/>
		<input type="submit" name="submit" value="Submit"/>
	</form>

</body>
</html>