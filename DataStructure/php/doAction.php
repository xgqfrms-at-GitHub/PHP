<?php 
header('content-type:text/html; charset=utf-8');
//1. 引入所需的文件
require_once '../swiftmailer_lib/swift_required.php';
require_once 'PdoMySQL.class.php';
require_once 'config.php';
require_once 'pwd.php';

//2.接收信息
$act = $_GET['act'];
$username = addslashes($_POST['username']);
$password = md5($_POST['password']);
// $password = md5($_POST['password'], raw_output);
$email = $_POST['email'];
$table = 'pdo_users';
if ($act === 'reg') {
	#  comment 1
	// comment 2
	/* comments 3*/
	# 时间戳
	$register_time = time();
	# 令牌
	$token = md5($username.$password.$register_time);
	# expire time
	$token_expire = $register_time+24*3600;
	# status 0; 默认： 未激活
	$data = compact('username','password','email','token','token_expire','register_time');

	// Fatal error: Call to a member function add() on a non-object in  ????
	$res = $PdoMySQL -> add($data,$table);
    // register failure, delete the register data!
    $lastInsertId = $PdoMySQL -> getLastInsertID();
	if ($res) {
		# send email  QQ ?
		// $transport = Swift_SmtpTransport::newInstance('smtp.qq.com',25);
		$transport = Swift_SmtpTransport::newInstance('smtp-mail.outlook.com',25);
		$transport = Swift_SmtpTransport::newInstance('smtp-mail.outlook.com',587);
		//?  smtp-mail.outlook.com 587/25
		# http://email.about.com/od/Outlook.com/f/What-Are-The-Outlook-com-Smtp-Server-Settings.htm
		$transport -> setUsername($e_name);
		$transport -> setPassword($e_pwd);
		# mailer
		$mailer = Swift_Mailer::newInstance($transport);
		# message
		$message = Swift_Message::newInstance();
		# $arrayName = array('' => , );
		$message -> setFrom(array('anonymous-ufo@outlook.com' => 'anonymous-ufo'));
		$message -> setTo(array($email => 'DSQC_xgqfrms'));
		$message -> setSubject('activate email');
		$message -> setCharset('UTF-8');//?
		# 修改 status；配置 host,ip,php 等资源；token 验证；
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?act=active&token={$token}";
		# url encode 
		$urlencode = urlencode($url);
		$str = <<< EOF
		hello {$username},welcome to this website!<br/>
		click the below link to activate your account!<br/>
		<a href="{$url}">{$urlencode}</a><br/>
		if click the link no reponse, please copy and paste it to the address bar of browser!<br/>
		Note: the valid time of the link is in 24 hour!
EOF;
		$message -> setBody("{$str}",'text/html','utf-8');
		# attachment 附件 ?
		$attachment = Swift_Attachment::newInstance();
		$attachment -> setBody();
		$attachment -> setFilename();
		try {
			if ($mailer -> send($messagem)) {
				echo "register succeed, 3 seconds redirect to login page!<br/>";
				echo "{$username} congratulations! please goto your email-box{$email} and activate your account!<br/>";
				echo "<meta http-equiv='refresh' content='3 ;url=index.php#tologin'/>";
			} else {
				$PdoMySQL -> delete($table,'id='.$lastInsertId);
				echo "register failure, 3 seconds redirect to register page!<br/>";
				echo "{$username} sorry! please re-registration!<br/>";
				echo "<meta http-equiv='refresh' content='3 ;url=index.php#toregister'/>";
			}
			
		} catch (Swift_ConnectionException $e) {
			echo "Exception Error :".$e->getMessage();
		}
	} else {
		echo "register failure!: 3 seconds redirect to register page!";
		echo "<meta http-equiv='refresh' content='3 ;url=index.php#toregister'/>";
		// echo '<meta http-equiv="refresh" content="3 ;url=index.php#toregister"/>'
	}
	


} else if ($act === 'login') {
	//PHP-密码salt http://www.imooc.com/wiki/detail/id/615
	//PHP cURL 函数 http://www.imooc.com/wiki/detail/id/3329
	$row=$PdoMySQL->find($table,"username='{$username}' AND password='{$password}'",'status');
	if ($row['status']==0){
		echo '请先激活在登陆';
		echo '<meta http-equiv="refresh" content="3;url=index.php#tologin"/>';
	} else {
		echo '登陆成功,3秒钟后跳转到首页';
		echo '<meta http-equiv="refresh" content="3;url=index.php#tologin"/>';
	}
} else if ($act === 'activation') {
	# activation
	$token = addslashes($_GET['token']);
	$row = $PdoMySQL -> find($table,"token='{$token}' AND status=0",array('id','token_expire'));
	$now = time();
	if ($now > $row['token_expire']) {
		echo "token_expire";
	} else {
		$res = $PdoMySQL -> update(array('status'=>1),$table,'id='.$row['id']);
		if ($res) {
			echo "register succeed, 3 seconds redirect to login page!<br/>";
		    echo "<meta http-equiv='refresh' content='3 ;url=index.php#tologin'/>";
		} else {
			echo "register failure!: 3 seconds redirect to register page!";
			echo "<meta http-equiv='refresh' content='3 ;url=index.php#toregister'/>";
		}
		
	}
	
}


/*
try{
	$sql = <<< EOF
           CREATE TABLE IF NOT EXISTS users(
	       id INT(32) UNSIGNED AUTO_INCREMENT KEY,
	       username VARCHAR(255) NOT NULL UNIQUE,
	       password VARCHAR(255) NOT NULL,
	       email VARCHAR(255) NOT NULL UNIQUE,
	       token VARCHAR(255) NOT NULL UNIQUE,
	       token_expire INT(32) NOT NULL DEFAULT '0',
	       status tinyint(1) NOT NULL,
	       register_time VARCHAR(255) NOT NULL
	       );
EOF;
    // $sql_create();
    $res = $pdo->exec($sql);
    var_dump($res);
    echo "exec() ? num : 0 ".$res."\n<br/>";

}catch (PDOException $e){
	echo ($e->getMessage());
}
*/





/**
 * 
 * SQL DEFAULT Constraint
 * http://www.w3schools.com/sql/sql_default.asp
 * 
 * SQL 约束（Constraints）
 * http://www.runoob.com/sql/sql-constraints.html
 * 
 * 13.1.18 CREATE TABLE Syntax
 * http://dev.mysql.com/doc/refman/5.7/en/create-table.html
 * 
 * 
 */
 ?>