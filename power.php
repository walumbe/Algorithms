<?php 

#function to check whether x is a power of 2

/*function isPowerOfTwo($x){
	#when x is 0
	return $x && (!($x & ($x -)));
}*/

#program to find the power of 2

function powerOfTwo($n){
	if ($n == 0){
		return 0;

	}
	while ($n != 1){
		if ($n % 2 != 0){
			return 0;

		}
		$n = $n / 2;
	}
	return 1;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Powers of two</title>
</head>
<body>
	<table border="1" cellspacing="4" cellpadding="6">
		<tr>
			<th>Powers</th>
		</tr>
		<tr>
			<th>n</th>
			<th>2</th>
			<th>3</th>
			<th>4</th>

		</tr>
		<tr>
			<td>2</td>
			<td>4</td>
			<td>8</td>
			<td>16</td>
		</tr>>
	</table>
</body>
</html>