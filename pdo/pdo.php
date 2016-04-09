<?php 
// PDO
$pdo = new PDO("mysql:host=localhost;dbname=test", 'root', '');

// $pdo->query("SELECT * FROM users WHERE username = $username");

$query = "SELECT * FROM user;";
     
// PDO
$result = $pdo->query($query);
// $result->setFetchMode(PDO::FETCH_CLASS, 'User');
 
while ($user = $result->fetch()) {
    echo ($user[0][0]."\n");
}

// $result = ($pdo->query("SELECT * FROM user;"));

// if (!$result) { 
// 	die("query error:".mysql_error()."</br>");
// }

// echo "query success!";

// while ($row = mysql_fetch_row($result)) {
// 	echo "<ul>";
// 	echo "<li>{$row[0][0]}</li>";
// 	echo "</ul>";
// }

echo "test over!";

//To print a list of all the drivers that PDO currently supports, use the following code:

var_dump(PDO::getAvailableDrivers());
/*

// Named Parameters
$params = array(':username' => 'test', ':email' => $mail, ':last_login' => time() - 3600);
     
$pdo->prepare('
    SELECT * FROM users
    WHERE username = :username
    AND email = :email
    AND last_login > :last_login');
     
$pdo->execute($params);
*/

?>