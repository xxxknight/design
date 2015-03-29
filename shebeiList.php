<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息展示</title>
<body>
<div class="pad_10">
<form name="searchform" action="" method="get" >
<input type="hidden" value="shebei" name="m">
<input type="hidden" value="shebei" name="c">
<input type="hidden" value="lists" name="a">
<input type="hidden" value="1581" name="menuid">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td>
		<div class="explain-col">
				分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类
				<select id="fenlei" name="fenlei">
					<option value="">--请选择--</option>
				</select>
				&nbsp;&nbsp;部&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;门
					<select id="bumen" name="bumen">
					<option value="">  --请选择--  </option>
					</select>
				<span id="address_span">&nbsp;&nbsp;配备区域
				<select id="address" name="address">
				<option value="" selected="selected">--请选择--</option>
				</select></span>

				<span id="address2_span" style="display:none">&nbsp;&nbsp;配备地点
				<select id="address2" name="address2">

				</select></span><br><br>
				设备名称&nbsp;&nbsp;<input name="keyword" type="text" size="30" value="" class="input-text" />
&nbsp;&nbsp;责任人&nbsp;&nbsp;<input type="text" size="10" name="people" value="" />
				<input type="submit" name="search" class="button" value="" />&nbsp;<!--a href="javascript:;" id ="quick_update_address">一键更新设备地址</a-->
	</div>
		</td>
		</tr>
    </tbody>
</table>
</form>
<div class="table-list">
<form name="myform" action="?m=admin&c=role&a=listorder" method="post">
    <table width="130%" cellspacing="0">
        <thead>
		<tr>
			<th align="left">设备名称</th>
			<th align="left">配备地点</th>
			<th align="left">部门</th>
			<th align="left">分类</th>
			<th align="left">数量</th>
			<th align="left">挂牌</th>
			<th align="left">配备时间</th>
			<th align="left">设备周期</th>
			<th align="left">压力指示区</th>
			<th align="left">责任人</th>
			<th align="left">备注</th>
			<th align="left">状态</th>
			<th align="left">操作</th>
		</tr>
        </thead>
        <tbody>
        </tbody>
</table>
 <div id="pages"></div>
</form>
</div>
</div>
<script type="text/javascript"></script>
</body>
</html>