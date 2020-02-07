<?php

/*mysqli_connect("localhost","root","") or die("Could not connect!");
mysqli_select_db("brute") or die("Could not find db!");
*/
$conn = new mysqli("localhost","root","","brute");

if(!$conn)
{
	die("Connection Failed!.mysqli_connect_error()");
}

$output = '';
if(isset($_POST["search"]))
{
	$search_query = $_POST['search'];
	$search_query = preg_replace("#[^0-9a-z]#i","",$search_query);

	$query = mysqli_query($conn,"SELECT * FROM member WHERE first_name  LIKE '%$search_query%' OR last_name LIKE  '%$search_query%'") or die("Could not search!");
	$count = mysqli_num_rows($query);

	if ($count == 0)
	{
		$output = "There was no search results!";
	}
	else 
	{
		while ($row = mysqli_fetch_array($query)) {
			$first_name= $row['first_name'];
			$last_name = $row['last_name'];
			$id = $row['id'];

			$output .= '<div>'.$first_name.' '.$last_name.'</div>';

		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
	<form action="string_search.php" method="POST">
		<input type="text" name="search"  placeholder="Search for Characters..">
		<input type="submit" value="Search">
	</form>
	<?php print("$output"); ?>
</body>
</html>