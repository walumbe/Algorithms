<?php
$description = trim($_POST['description']);
$check = $db_con->prepare("SELECT * FROM  tb_keywords");
$check->execute();
$row=$check->fetch(PDO::FETCH_OBJ);
$positive = $row->keyword;

function brute_force($positive, $description)
{
    $n = strlen($description);
    $m = strlen($positive);
    for ($i = 0; i < $n-$m; $i++) {
        $j = 0;
        while ($j < $m && $description[$i+$j] == $positive[$j]) {
            $j++;
        }
        if ($j == $m) {
            return $i;
        }
        return -1;
    }
    $find[$i]=brute_force($positive, $description);
    $create=$db_con->prepare("INSERT INTO tb_post(description) VALUES(:description)");
    $create->bindParam(":description", $description);
    $create->execute();
    $row=$create->rowCount();
    if($row>0) {
        echo "success";
    } else {
        echo "fail";
    }


    /*
    $description = trim($_POST['description']);
$check = $db_con->prepare("SELECT * FROM  tb_keywords");
$check->execute();
while($row = $check->fetch(PDO::FETCH_ASSOC)) {  
    $search = $row['keyword'];
    if (preg_match("/\b$search\b/", $description)) {  
        $create=$db_con->prepare("INSERT INTO tb_post(description) VALUES(:description)");
        $create->bindParam(":description", $description);
        $create->execute();
        $row=$create->rowCount();
        if($row>0) {
            echo "success";
        } else {
            echo "fail";
        }
    }
} 
    */

}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<textarea type="text" class="form-control" name="description" id="description" placeholder="Description" required /></textarea>
</body>
</html>