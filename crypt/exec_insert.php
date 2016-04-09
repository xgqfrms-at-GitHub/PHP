<?php 
//PDO
try{
	// $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '123456', options)
	$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '123456');
	$sql = <<< EOF
	       CREATE TABLE IF NOT EXISTS users(
	       id INT UNSIGNED AUTO_INCREMENT KEY,
	       username VARCHAR(32) NOT NULL UNIQUE,
	       password CHAR(255) NOT NULL,
	       email VARCHAR(255) NOT NULL
	       );
EOF;
    $res = $pdo->exec($sql);
    var_dump($res);
    echo "exec() ? ".$res.": 0 <br/>";
    // define('pwd', 'pdw0001', case_insensitive);
    $pwd = "pwd&md5";
    $pwd1 = "pwd@md51";
    $pwd2 = "pwd$md52";
    $salt = "salt_md5";

    $md5 = crypt($pwd, $salt);
    echo "crypt:{$md5}<br/>";
    $md51 = crypt($pwd1, $salt);
    echo "crypt:{$md51}<br/>";
    $md52 = crypt($pwd2, $salt);
    echo "crypt:{$md52}<br/>";

    $str = md5("Shanghai");
    echo ("md5:->Shanghai:{$str}<br/>");

    $sql = <<< EOF
             INSERT users(username,password,email) 
             VALUES ("u01","$md5","u01@ufo.xyz"),
             ("u02","{$md51}","u02@ufo.xyz"),
             ("u03","$md52","u03@ufo.xyz");
EOF;
    echo "{$sql}<br/>";
    $res = $pdo->exec($sql);
    var_dump($res);
    echo "<br/>";

    echo "exec() ? ".$res.": 0 <br/>";
}catch(PDOException $e){
	echo ($e->getMessage());
}




 ?>