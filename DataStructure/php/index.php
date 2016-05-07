<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <!-- SEO : Search Engine Optimization  -->
    <meta name="keywords" content="DSQCW,Data Structure Quality Course Website">
    <meta name="description" content="DSQCW:Data Structure Quality Course Website. It is a free Website for anybody who wants to learn Data Structure!">
    <meta name="author" content="xgqfrms 2016">
    <meta name="generator" content="Sublime Text3 && WAMP || LAMP">
    <meta http-equiv="refresh" content="3000; url=https://xgqfrms.github.io/DataStructure/">
    <!-- 自动刷新 $ 重定向 -->

    <!-- Browser Compatiable -->
    <meta http-equiv="X-UA-Compatible" content="chrome=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--media query-->
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no"/> 
    <title>DSQC| XGQFRMS</title>
    
    <!-- PHP 不支持 favicon.png/jpg! error bug!-->
    <link rel="shortcut icon" href="images/favicon.png"  type="image/x-icon">
   <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
</head>
<body>
    <div class="container">
        <header>
            <h1>DSQC<span>|Data Structure Quality Course</span></h1>
			<nav class="codrops-demos">
				<!-- <span>点击<strong>"加入我们"</strong>注册DSQC账号</span> -->
                <div class="logo">
                    <!-- favicon 命名error: favicon.xxx 无法显示 ? -->
                    <!-- 
                        <img src="images/favicon.jpg">
                        <img src="images/favicon.jpg">
                     -->
                     <!--  -->
                    <img src="images/banner.jpg">                       
                </div>
			</nav>
        </header>
        <section>				
            <div id="container_demo" >
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form  action="doAction.php?act=login" autocomplete="on" method="post"> 
                            <h1>登陆账号</h1> 
                            <p> 
                                <label for="username" class="uname" data-icon="u" > Your username </label>
                                <input id="username" name="username" required="required" type="text" placeholder="xgqfrms"/>
                            </p>
                            <p> 
                                <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                <input id="password" name="password" required="required" type="password" placeholder="************" /> 
                            </p>
                            <p class="keeplogin"> 
								<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
								<label for="loginkeeping">保持登陆状态</label>
							</p>
                            <p class="login button"> 
                                <input type="submit" value="登陆" /> 
							</p>
                            <p class="change_link">
								没有账号?
								<a href="#toregister" class="to_register">注册账号</a>
							</p>
                        </form>
                    </div>

                    <div id="register" class="animate form">
                        <form  action="doAction.php?act=reg" autocomplete="on" method="post"> 
                            <h1>注册账号</h1> 
                            <p> 
                                <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                <input id="usernamesignup" name="username" required="required" type="text" placeholder="xgqfrms" />
                            </p>
                            <p> 
                                <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                <input id="emailsignup" name="email" required="required" type="email" placeholder="xgqfrms@gmail.com"/> 
                            </p>
                            <p> 
                                <label for="passwordsignup" class="youpasswd" data-icon="p">Your password</label>
                                <input id="passwordsignup" name="password" required="required" type="password" placeholder="************"/>
                            </p>
                            <p class="signin button"> 
								<input type="submit" value="注册"/> 
							</p>
                            <p class="change_link">  
								已有账号?
								<a href="#tologin" class="to_register">登陆账号</a>
							</p>
                        </form>
                    </div>
					
                </div>
            </div>  
        </section>
    </div>
</body>
</html>