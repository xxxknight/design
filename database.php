<?php
$conn = mysql_connect ( "localhost", "root", "" );
if ($conn) {
	echo "数据库连接成功。<br/>";
} else {
	echo "数据库连接失败";
}
mysql_select_db ( "yidong", $conn );
mysql_query("set character set 'utf8'");//读库 
mysql_query("set names 'utf8'");//写库 
?>