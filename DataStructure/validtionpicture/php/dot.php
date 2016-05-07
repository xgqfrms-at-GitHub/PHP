<?php
session_start();//must be on the top
//picture type
header('Content-Type: image/png');
//create true color picture
$img = imagecreatetruecolor(100,30)or die('Cannot Initialize new GD image stream');;//width,height
$bgcolor = imagecolorallocate($img,30,30,30);
//draw picture with location
imagefill($img,0,0,$bgcolor);

//session
$captch_code=""; 
 
//iterator output font
for($i=0;$i<4;$i++){
	$fontsize = 6;//size  如果 font 是 1，2，3，4 或 5，则使用内置字体。	
	$fontcolor = imagecolorallocate($img,rand(120,250),rand(120,250),rand(120,250));
	
	//db 
	$data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	$fonttext = substr($data,rand(0,strlen($data)),1); //random num + string
	//拼接 字符串
	$captch_code.=$fonttext;
	//location 
	$x=($i*100)/4+rand(7,15);//width/Max($i)
	$y=rand(7,15);
	//draw font
	imagestring($img,$fontsize,$x,$y,$fonttext,$fontcolor);	
}
$_SESSION['authcode']=$captch_code;

//add point(set  pixel)
for($j=0;$j<200;$j++){
    $pointcolor = imagecolorallocate($img,rand(150,200),rand(150,200),rand(150,200));
	//location
	$x1=rand(0,100);
	$y1=rand(0,30);
	//draw point
	imagesetpixel($img,$x1,$y1,$pointcolor);
}
//add line
for($k=0;$k<3;$k++){
    $linecolor = imagecolorallocate($img,rand(200,250),rand(200,250),rand(200,250));
	//location
	$x1=rand(0,100);
	$x2=rand(0,100);
	$y1=rand(0,30);
	$y2=rand(0,30);
	//draw point
	imageline($img,$x1,$y1,$x2,$y2,$linecolor);
}

//output png picture
imagepng($img);
//destory picture
imagedestroy($img);
?>