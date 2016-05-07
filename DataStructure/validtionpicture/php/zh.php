<?php
session_start();//must be on the top
//picture type
header('Content-Type: image/png');
//create true color picture
$img = imagecreatetruecolor(200,60)or die('Cannot Initialize new GD image stream');;//width,height
$bgcolor = imagecolorallocate($img,30,30,30);
//draw picture with location
imagefill($img,0,0,$bgcolor);

//session
$fontface = 'simfang.ttf';
$strdb=array('小','欢','喜','我');
$captch_code=''; 
 
//iterator output font
for($i=0;$i<4;$i++){
		
	$fontcolor = imagecolorallocate($img,rand(120,250),rand(120,250),rand(120,250));
	$cn =$strdb[$i];
	$captch_code.=$cn;
	imagettftext($img,mt_rand(20,24),mt_rand(-60,60),(40*$i+20),mt_rand(30,35),$fontcolor,$fontface,$cn);
}
$_SESSION['authcode']=$captch_code;

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
/*
//$fontsize = mt_rand(20,25);//size  如果 font 是 1，2，3，4 或 5，则使用内置字体。
	//db 
	$data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	$fonttext = substr($data,rand(0,strlen($data)),1); //random num + string
	//拼接 字符串
	$captch_code.=$fonttext;
	//location 
	$x=($i*40)+20;
	$y=mt_rand(30,40);
	//draw font
	imagestring($img,$fontsize,$x,$y,$fonttext,$fontcolor);	
*/
?>
