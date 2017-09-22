<?php
include("config.php");
if(isset($_POST['submit']))
{
	$cat=$_POST['category'];
	$sql="INSERT INTO `tbl_category`(`cat_name`) VALUES ('".$cat."')";
	$res=mysql_query($sql);
	if($res)
	{
		echo "ok";
	}
	else
	{
		echo "not ok";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>add category</title>
</head>
<body>
<form action="" method="POST">
add category<input type="text" name="category" value=""/>
<input type="submit" name="submit" value="add"/>
</form>
</body>
</html>