<?php 
if($_POST["user_name"]==""){
	echo "请输入用户名";	
	echo "<a href='denglu.php'>返回</a>";
	}
elseif($_POST["parsword"==""]){
	echo  "请输入密码";	
	echo "<a href='denglu.php'>返回</a>";
	}
else{
	$link=mysql_connect("localhost","root","")or die("不能连接数据库");
	mysql_select_db("userdb",$link)or die("选择错误");
	$sql="select*from user_db where username = ".$_POST['username'].'and password = '$_POST['paddword'];
	$result=mysql_query($sql,$link);
	$news=mysql_fetch_assoc($result);
	mysql_free_result($result);
	if($news['user_name']==$_POST['user_name'] && $news['parsword']==$_POST['parsword']){
		echo "登陆成功";echo "<a href='index.php'>登陆</a>";
		}
	else{
		echo "密码错误或用户名不正确";echo "<a href='denglu.php'>返回</a>";
		}
	}
?>