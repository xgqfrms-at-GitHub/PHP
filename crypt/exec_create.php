<?php 
//PDO

try{
	// $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '123456', options)
	$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '123456');

	$sql = <<< EOF
           CREATE TABLE IF NOT EXISTS users( 
		       id INT(32) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
		       username VARCHAR(255) NOT NULL UNIQUE COMMENT '用户名', 
		       password VARCHAR(255) NOT NULL COMMENT'密码',
		       email VARCHAR(255) NOT NULL UNIQUE COMMENT '邮箱',
		       token VARCHAR(255) NOT NULL UNIQUE COMMENT '帐号激活码',
		       token_expire INT(32) NOT NULL COMMENT '激活码有效期',
		       status TINYINT(1) NOT NULL DEFAULT '0' COMMENT '状态,0-未激活,1-已激活',
		       register_time  VARCHAR(255) NOT NULL COMMENT '注册时间'
           )ENGINE=INNODB  DEFAULT CHARSET=utf8; 
EOF;

    $res = $pdo->exec($sql);
    //
    var_dump($res);
    echo "exec() ? num : 0 ".$res."\n<br/>";

}catch(PDOException $e){
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