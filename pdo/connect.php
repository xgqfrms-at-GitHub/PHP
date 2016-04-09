<?php 
mysql_connect("localhost","root","") or die("connect error:".mysql_error()."</br>");

echo "connect success!";

mysql_select_db("test") or die("select db error:".mysql_error()."</br>");

echo "select db success!";

$query = ("select *from user;");

$result = mysql_query($query);

if (!$result) { 
	die("query error:".mysql_error()."</br>");
}

echo "query success!";

while ($row = mysql_fetch_row($result)) {
	echo "<ul>";
	echo "<li>{$row[0][0]}</li>";
	echo "</ul>";
}

echo "test over!";
?>