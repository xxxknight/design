<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息展示</title>

<?php
//header("content-type:text/html;charset=utf-8");
include ("database.php");

$result = mysql_query("SELECT * FROM lzy_shebei where id>100 and id<200");

while($row = mysql_fetch_array($result))
{
	echo $row['id'] . " " . $row['name'];
	echo "<br />";
}


?>
</html>
