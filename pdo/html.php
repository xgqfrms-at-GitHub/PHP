<!document html>
<html>
<head>
<meta content="ui-header-logo.png" itemprop="image">
<link rel="icon" type="image/x-icon" href="googleg_lodp.ico"  />
<meta  charset="utf-8">
<style type="text/css">
img{
	width:70px;
	height:70px;
}
/*css 默认 position：relative*/
.img{
	position:absolute;
	margin: 30px 60px;
	width:100px;
	height:100px;
	background:red;
}
#container{
	width:300px;
	height:300px;
	background:green;
}
</style>
</head>
<body>
<div id="container">
<div class="img">
<img src="green.png" alt="success" />
</div></div>
<?php
echo "wwwRoot success!";
/*
phpinfo();
*/

/*"" 与 "" 嵌套使用，防止匹配error！*/
?>

</body>
</html>

