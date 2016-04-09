<?php 
//PDO

try{
	// $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '123456', options)
	$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '123456');
	$sql = <<< EOF
	       CREATE TABLE IF NOT EXISTS users(
	       id INT UNSIGNED AUTO_INCREMENT KEY,
	       username VARCHAR(20) NOT NULL UNIQUE,
	       password CHAR(32) NOT NULL,
	       email VARCHAR(32) NOT NULL
	       );
EOF;
    $res = $pdo->exec($sql);
    var_dump($res);
    echo "exec() ? num : 0 ".$res."\n<br/>";

}catch(PDOException $e){
	echo ($e->getMessage());
}
















 ?>