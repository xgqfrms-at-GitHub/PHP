<?php 
//http://www.imooc.com/qadetail/131311 ?
/*
从你的结果来看 是因为把  "'.md5('pdw02').'"   双引号中的内容看做是字符串了,
可以把 "'.md5('pdw02').'"  边上的双引号，单引号和. 去掉试试 即变成 md5('pdw02') 这样
(测试通过了！)
*/
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
    echo "exec() ? ".$res.": 0 \n";
 
    $sql = <<< EOF
             INSERT users(username,password,email) 
             VALUES ("u01",md5('pdw01'),"u01@ufo.xyz"),
             ("u02",md5('pdw02'),"u01@ufo.xyz"),
             ("u03",md5('pdw03'),"u01@ufo.xyz");
EOF;
    $res = $pdo->exec($sql);
    var_dump($res);
    echo "exec() ? ".$res.": 0 \n";
}catch(PDOException $e){
    echo ($e->getMessage());
}
 
 
 
 
 ?>