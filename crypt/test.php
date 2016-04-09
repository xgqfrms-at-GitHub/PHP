<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MD5 加密</title>
</head>
<body>
<?php
echo "<h1>MD5 加密</h1><br/>";
/*
	计算字符串 "Hello　World!" 的 MD5 散列：
	md5() 函数计算字符串的 MD5 散列。
	md5() 函数使用 RSA 数据安全，包括 MD5 报文摘要算法。

	语法
	md5(string,raw)
	参数	描述
	string	必需。规定要计算的字符串。
	raw	
	可选。规定十六进制或二进制输出格式：
	TRUE - 原始 16 字符二进制格式
	FALSE - 默认。32 字符十六进制数
*/

$str = "Hello World!";
$md5ture = md5($str, TRUE);
$md5false = md5($str, false);

echo "字符串：{$str}<br>";
echo "TRUE - 原始 16 字符二进制格式：{$md5ture}<br/>";
echo "FALSE - 32 字符十六进制格式：{$md5false}<br/>";

/*
	计算文本文件 "test.txt" 的 MD5 散列：
	md5_file() 函数计算文件的 MD5 散列。
	md5_file() 函数使用 RSA 数据安全，包括 MD5 报文摘要算法。

	md5_file(file,raw)
	参数	描述
	file	必需。规定要计算的文件。
	raw	
	可选。布尔值，规定十六进制或二进制输出格式：
	TRUE - 原始 16 字符二进制格式
	FALSE - 默认。32 字符十六进制数
*/

$filename = "test.txt";//url path ?
$md5fileture = md5_file($filename,TRUE);
$md5filefalse = md5_file($filename,false);

echo "文件: {$filename}<br/>";
echo "TRUE - 原始 16 字符二进制格式：{$md5fileture}<br/>";
echo "FALSE - 32 字符十六进制格式：{$md5filefalse}<br/>";

?>
</body>
</html>