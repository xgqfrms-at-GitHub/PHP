<?php
http://www.imooc.com/code/2913

$dsn = 'mysql:dbname=code1;host=127.0.0.1';
$user = 'code1';
$password = '';
// 
$id = 52084977;
$na = "官方李白";
$ag = 23;
$cl = "高一三班";
$st = 1;
$ct = "2016-01-11 11:11:11";
// 
try{
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'select * from user';
    $query = "INSERT INTO user SET id=:id,name=:na,age=:ag,class=:cl,status=:st,create_time:ct";
    
    $dbh->query("set names 'utf8'");
    $stmt = $dbh->prepare($query);
    
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':na',$na);
    $stmt->bindParam(':ag',$ag);
    $stmt->bindParam(':cl',$cl);
    $stmt->bindParam(':st',$st);
    $stmt->bindParam(':ct',$ct);
    
    $stmt->execute();
    
    $result = $dbh->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    print_r($row);
    // $foreach($dbh->query($sql) AS $row){
    //     $name =$row['0'];
    //     echo $name."_NAME";
    //     print_r($row);
    // }
}catch(PDOException $e){
    echo "数据库连接失败:".$e->getMessage();
}

// $link = mysql_connect('127.0.0.1', 'code1', '') or die('数据库连接失败');
// mysql_select_db('code1');
// mysql_query("set names 'utf8'");
// $result = mysql_query('select * from user limit 1');
// $row = mysql_fetch_assoc($result);
// print_r($row);

/*
Array
(
    [id] => 52084976
    [name] => 李白
    [age] => 19
    [class] => 高三五班
    [status] => 0
    [create_time] => 2016-03-22 11:17:07
)
*/




/*
mysql扩展进行数据库连接的方法：

$link = mysql_connect('mysql_host', 'mysql_user', 'mysql_password');

mysqli扩展：

$link = mysqli_connect('mysql_host', 'mysql_user', 'mysql_password');

PDO扩展:

$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
$user = 'dbuser';
$password = 'dbpass';
$dbh = new PDO($dsn, $user, $password);

*/
?>