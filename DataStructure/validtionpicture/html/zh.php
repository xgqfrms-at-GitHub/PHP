<?php
if(isset($_REQUEST['authcode'])){
  session_start();
  if(strtilower($_REQUEST['authcode'])==$_SESSION['authcode']){
     echo'<font color="#0000CC">输入正确！</font>';
  }else{
      echo'<font color="#0000CC">输入error！</font>';
  }
  exit();
}
?>
<!HTML　DOCTYPE>
<html>
<head>
     <title></title>
	 <meta charset="utf-8">
	<!-- <script type="text/javascript;version=1.8" src="../js/x.js"></script>-->
	 <link rel="stylesheet" type="text/css" href="../css/index.css" >
</head>
<body>
     <fieldset style="border: 1px solid red">
     <div class="header">
	 <header>
	     <div>header</div>
	 </header>
	 </div>
	 <div class="fcontainer">
	 <fieldset style="border: 1px solid red" >
	     <form class="form" action="../php/validate.php">
		     <fieldset class="text">
			     <label>用户名：</label>
			     <input type="text" name="username" size="20"/><br/><p></p>
				 <input type="hidden" value="error!"/>
			     <label>密码：&nbsp;</label>
			     <input type="password" name="password" size="20" /><br/><p></p>
				 <input type="hidden" value="error!"/>
			     <label>验证码：</label>
			     <img id="captcha_img" style="border:1px sloid red;width:200px ;height:60px" src="../php/chinese.php?r=<?php echo rand();?>" /> 
			     <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='../php/chinese.php?r='+Math.random()">看不清，换一个！</a>
				 
				 <br/>
			 </fieldset> 
			 <fieldset class="button">
			     <br/><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			     <input type="submit" value="提交" />
				 <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				 <input type="reset" value="重置" />
			 </fieldset>
		 </form>
	 </fieldset></div>
	 <div></div>
	 <div></div>
	 <div></div>
	 <div></div>
	 <div class="footer">
	 <footer style="border: 1px solid red">
	     <div>&copy;xgqfrms 2015</div>
	 </footer></div>
	 </fieldset>
</body>
</html>