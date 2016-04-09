<?php 
// PDO
try{
	$dsn = 'mysql:host=localhost;dbname=test';
	$username = 'root';
	$passwd = '123456';
	$pdo = new PDO($dsn,$username,$passwd);
	var_dump($pdo);
	$sql = <<<EOF
    INSERT user(username,password) VALUES("u00","000"),("u02","002"),("u03","003");
EOF;
    $result = $pdo->exec($sql);
    echo ($result);
}catch(PDOException $e){
	echo $e->getMessage();
}

//To print a list of all the drivers that PDO currently supports, use the following code:

// $xxx = var_dump(PDO::getAvailableDrivers());
// echo ($xxx);


/*
INSERT user(username,password) VALUES("u01","'.md5()'"),("u02","'.md5('pwd').'"),("u03","'.md5()'");
try{
	$pdo = new PDO("mysql:host=localhost;dbname=test", 'root', '');
	$sql = <<< EOF 
	INSERT user(username,passwd,email) VALUES 
	("u01","'.md5()'","u01@ufo.xyz"),
    ("u02","'.md5('pwd').'","u01@ufo.xyz"),
	("u03","'.md5()'","u01@ufo.xyz");
EOF;// EOF; 结束符要顶格写
    $result = $pdo->query($query);
}catch(PDOException $e){
	echo $e->getMessage();
}
*/
// http://stackoverflow.com/questions/20931450/parse-error-syntax-error-unexpected-t-sl


// phpMyAdmin 尝试连接到 MySQL 服务器，但服务器拒绝连接。您应该检查配置文件中的主机、用户名和密码，并确认这些信息与 MySQL 服务器管理员所给出的信息一致。
// https://www.ostraining.com/blog/coding/error-1045-phpmyadmin/
?>