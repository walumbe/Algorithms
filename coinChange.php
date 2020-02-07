<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="coinChange.php">
		Enter the Amount:<input type="number" name="amount"><br/>
		<input type="submit" name="submit" value="submit" />
	</form>
	<?php
	error_reporting(0);
	function getMinimumCoins($amount,$coin_val)
	{
	    $coins_required=array();
		rsort($coin_val);
		for($i=0; $i<count($coin_val); $i++)
		{
		    while($amount >= $coin_val[$i])
		    {
		        $amount-=$coin_val[$i];
		        array_push($coins_required, $coin_val[$i]);
		    }
		}
		
		$count_array = array_count_values($coins_required);
		echo "<table style='border:1px solid #333;border-collapse:collapse;'>";
		echo "<tr>";
		echo "<td style='font-weight:bold; border:1px solid #333;'>Change</td>";
		echo "<td style='font-weight:bold; border:1px solid #333;'>Frequency</td>";
		echo "</tr>";
		while (list($key,$val) = each($count_array))
		{
			echo "<tr>";
			echo "<td style='text-align:center;border:1px solid #333;'>$key</td> ";
			echo "<td style='text-align:center;border:1px solid #333;'>$val</td>";
			echo "</tr>";
		}
		echo "</table>";
		return  implode(",", $coins_required);

	}
		$amount = $_POST["amount"];
		$coin_val=array(1,5,10,20,40,50,100,200,500);
		for ($row=0;$row < 5;$row++) {
			for ($col = 0;$col<5;$col++){
				echo  $coin_val[1][2][3][4][5][$row][$col]." ";
			}
		}

		if($amount == 1000 || $amount > 999) 
		{
			echo "Please enter an amount less than 1000.";
			exit();
		}elseif ($amount < 1) {
			echo "Please enter an amount that is equal to or more than 1.";
			exit();
		}
		echo "<br/>";
		getMinimumCoins($amount,$coin_val);
	?>
</body>
</html>

