<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>DESIGN</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />

<style type="text/css">
</style>

<script type="text/javascript" src="style/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
	$(function() {
		//alert("hehe");
	});
</script>
</head>
<body>
	<div class="pad1">
		<form name="searchform" action="" method="post">
			<div class="explain-col attr">
				Type <select id="type" name="type">
					<option value="">--please choose--</option>
				<?php
				for($i = 1; $i <= 10; $i ++) {
					echo "<option value=\"$i\">$i</option>";
				}
				?>
			</select> Time <select id="bumen" name="bumen">
					<option value="">--please choose--</option>
				</select> Place <select id="address" name="address">
					<option value="" selected="selected">--please choose--</option>
				</select> <br /> <br /> Name<input name="keyword" type="text"
					size="30" value="" class="input-text" /> People<input type="text"
					size="10" name="people" value="" /> <input type="submit"
					name="search" class="button" value="Submit" />
			</div>
		</form>
		<div class="view">
			GRAPH
			<table width="100%" cellspacing="0">
				<thead>
					<tr>
						<th align="left">NAME</th>
						<th align="left">PALCE</th>
						<th align="left">DEPARTMENT</th>
						<th align="left">TYPE</th>
						<th align="left">QUANITY</th>
						<th align="left">ADDITION</th>
						<th align="left">STATE</th>
						<th align="left">OPERATION</th>
					</tr>
				</thead>
				<tbody>
					<style>
td {
	font: 12px;
}

#page {
	font: 12px;
}
</style>
1234
1234
1234
<?php
error_reporting ( 0 );
include ("page.class.php");
// 连接数据库
include ("database.php");

// 分页模块
$pagesize = 5; // 定义每个页面显示的条数
$num_query = mysql_query ( "select count(*) from `lzy_shebei` " ); // 查询数据库总条数
$rs = mysql_fetch_array ( $num_query );
$count = $rs [0]; // 总条数
$pagenum = ceil ( $count / $pagesize ); // 总页数;采用进一法ceil()
$page = empty ( $_GET ['page'] ) ? 1 : $_GET ["page"]; // 显示当前页
                                                       // 显示当页面信息页面

$sql = "select * from lzy_shebei limit " . ($page - 1) * $pagesize . "," . $pagesize;
$query = mysql_query ( $sql );
while ( $rs = mysql_fetch_array ( $query ) ) {
	?>
<tr>
						<td>标题：<?php echo $rs[id]; ?> </td>
						<td>作者：<?php echo  $rs[name]; ?> </td>
						<td>时间：<?php echo  $rs[time]; ?> </td>
					</tr>
<?php
}
// 显示分页符

$page = new PageClass ( $count, $pagenum, $page, '?page={page}' ); // 用于动态

?>
           
           </tbody>
			</table>
			<div id="pages">
			<?php echo "<font id='page'>" . $page->myde_write () . "</font>"; // 显示?>
			</div>
		</div>
	</div>

</body>
</html>