<?php
//must be on the top
session_start();

//picture type
header('Content-Type: image/png');

//create true color picture
//width,height
$img = imagecreatetruecolor(100,30)or die('Cannot Initialize new GD image stream');

/*
int imagecolorallocate ( resource $image , int $red , int $green , int $blue )

imagecolorallocate() 返回一个标识符，代表了由给定的 RGB 成分组成的颜色。
red，green 和 blue 分别是所需要的颜色的红，绿，蓝成分。
这些参数是 0 到 255 的整数或者十六进制的 0x00 到 0xFF。
imagecolorallocate() 必须被调用以创建每一种用在 image 所代表的图像中的颜色。

*/
//draw picture with allocate
$bgcolor = imagecolorallocate($img,10,10,30);

//fill images 
imagefill($img,0,0,$bgcolor);

//fontface 
$fontface = 'msyh.ttc';
//$fontface = 'simfang.ttf';
//$fontface = 'arial.ttff';


//english DB
$stringdb = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";

$strdb = str_split($stringdb,3);// 字符串切割成单个字符
/*header('Content-Type: text/png;charset=utf-8');
var_dump($str);
die();*/
//中文大，需要调整加倍的大小 width，height，location ……
//session
$captch_code=''; 
//iterator output font
for($i=0;$i<4;$i++){
	$fontsize = mt_rand(20,24);//size  如果 font 是 1，2，3，4 或 5，则使用内置字体。	
	$fontcolor = imagecolorallocate($img,rand(120,250),rand(120,250),rand(120,250));
	$angle = mt_rand(-60,60);
	$index=rand(0,count($strdb));
	$fonttext = $strdb[$index]; //random chinese
	//拼接 字符串
	$captch_code.=$fonttext;
	//location 
	$x=($i*40)+20;
	$y=mt_rand(30,35);
	//draw point
	imagettftext($img,$fontsize,$angle,$x,$y,$fontcolor,$fontface,$fonttext);//参数不可以丢失呦！
	
}
$_SESSION['authcode']=$captch_code;
/*
*/

//add point(set  pixel)
for($j=0;$j<700;$j++){
    $pointcolor = imagecolorallocate($img,rand(150,200),rand(150,200),rand(150,200));
	//location
	$x1=rand(0,200);
	$y1=rand(0,60);
	//draw point
	imagesetpixel($img,$x1,$y1,$pointcolor);
}
//add line
for($k=0;$k<4;$k++){
    $linecolor = imagecolorallocate($img,rand(200,250),rand(200,250),rand(200,250));
	//location
	$x1=rand(0,200);
	$x2=rand(0,200);
	$y1=rand(0,60);
	$y2=rand(0,60);
	//draw point
	imageline($img,$x1,$y1,$x2,$y2,$linecolor);
}

//output png picture
imagepng($img);
//destory picture
imagedestroy($img);
?>