<?php 
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
	$res = $PdoMySQL -> add($data,$table);
	if ($res) {
		# send email  QQ ?
		$transport = Swift_SmtpTransport::newInstance('smtp.qq.com',25);
		//?  smtp-mail.outlook.com 587/25
		# http://email.about.com/od/Outlook.com/f/What-Are-The-Outlook-com-Smtp-Server-Settings.htm
		$transport -> setUsername($e_name);
		$transport -> setPassword($e_pwd);
		# mailer
		$mailer = Swift_Mailer::newInstance($transport);
		# message
		$message = Swift_Message::newInstance();
		# $arrayName = array('' => , );
		$message -> setFrom(array('admin@outlook.com' => 'admin'));
		$message -> setTo(array($email => 'immoc'));
		
	} else {
		echo "register failure!: 3 seconds redirect to register page!";
		echo "<meta http-equiv='refresh' content='3 ;url=index.php#toregister'/>";
		// echo '<meta http-equiv="refresh" content="3 ;url=index.php#toregister"/>'
	}
	


} else if ($act === 'login') {
	# code...
}


/**/
try{
	$sql = <<< EOF
           CREATE TABLE IF NOT EXISTS pdo_users(
	       id INT(32) UNSIGNED AUTO_INCREMENT KEY,
	       username VARCHAR(255) NOT NULL UNIQUE,
	       password VARCHAR(255) NOT NULL,
	       email VARCHAR(255) NOT NULL UNIQUE,
	       token VARCHAR(255) NOT NULL UNIQUE,
	       token_expire INT(32) NOT NULL DEFAULT(0),
	       status tinyint(1) NOT NULL,
	       register_time VARCHAR(255) NOT NULL
	       );
EOF;
    $res = $pdo->exec($sql);
    var_dump($res);
    echo "exec() ? num : 0 ".$res."\n<br/>";

}catch (PDOException $e){
	echo ($e->getMessage());
}






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