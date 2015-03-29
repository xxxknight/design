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
	   <form name="searchform" action="" method="post" >
		<div class="explain-col attr">
			Type
			<select id="type" name="type">
				<option value="">--please choose--</option>
				<?php
                  for($i=1;$i<=10;$i++){
                   echo "<option value=\"$i\">$i</option>";
                  }
                 ?>
			</select> 
			Time
			<select id="bumen" name="bumen">
				<option value="">--please choose--</option>
			</select> 
			Place
			<select id="address" name="address">
					<option value="" selected="selected">--please choose--</option>
			</select>
			<br/> 
			<br/> 
			Name<input name="keyword" type="text" size="30" value="" class="input-text" />
			People<input type="text" size="10" name="people" value="" /> 
			<input type="submit" name="search" class="button" value="Submit" />
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
           <?php
					include ("database.php");
					/*  $_GET[page]为当前页，如果$_GET[page]为空，则初始化为1  */
					if ($_GET[page]){
						$_GET[page]=1;}
					   if (is_numeric($_GET[page])){
						$page_size=4;     								//每页显示4条记录
						$query="select count(*) as total from lzy_shebei  order by id desc";   
						$result=mysql_query($query);      					//查询符合条件的记录总条数
						$message_count=mysql_result($result,0,"total");		//要显示的总记录数
						$page_count=ceil($message_count/$page_size);	  	//根据记录总数除以每页显示的记录数求出所分的页数
						$offset=($_GET[page]-1)*$page_size;						//计算下一页从第几条数据开始循环  
						$sql=mysql_query("select * from lzy_shebei order by id desc limit $offset, $page_size");
						$row=mysql_fetch_object($sql);
						if(!$row){
							echo "<font color='red'>暂无公告信息!</font>";
						}
						do{
						?>
                      <tr bgcolor="#FFFFFF">
                        <td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:5px;"><?php echo $row->id;?></td>
                        <td style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:5px;"><?php echo $row->name;?></td>
                      </tr>
					<?php
						}while($row=mysql_fetch_object($sql));
					}
					?>
           </tbody>
           </table>
           <div id="pages">
            <table width="550" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <!--  翻页条 -->
							<td width="37%">&nbsp;&nbsp;页次：<?php echo $_GET[page];?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $message_count;?> 条&nbsp; </td>
							<td width="63%" align="right">
							<?php
							/*  如果当前页不是首页  */
							if($_GET[page]!=1){
							/*  显示“首页”超链接  */
							echo  "<a href=list.php.php?page=1>首页</a>&nbsp;";
							/*  显示“上一页”超链接  */
							echo "<a href=list.php.php?page=".($_GET[page]-1).">上一页</a>&nbsp;";
							}
							/*  如果当前页不是尾页  */
							if($_GET[page]<$page_count){
							/*  显示“下一页”超链接  */
							echo "<a href=list.php.php?page=".($_GET[page]+1).">下一页</a>&nbsp;";
							/*  显示“尾页”超链接  */
							echo  "<a href=list.php.php?page=".$page_count.">尾页</a>";
							}
							mysql_free_result($sql);
							mysql_close($conn);
							?>
                        </tr>
                      </table>
                  </div>
	 </div>
</div>

</body>
</html>