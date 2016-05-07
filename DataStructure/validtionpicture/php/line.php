<?php
//picture type
header('Content-Type: image/png');
//create true color picture
$img = imagecreatetruecolor(100,30)or die('Cannot Initialize new GD image stream');;//width,height
$bgcolor = imagecolorallocate($img,0,0,0);
//draw picture with location
imagefill($img,0,0,$bgcolor);

//iterator output font
for($i=0;$i<4;$i++){
	$fontsize = 6;//size  如果 font 是 1，2，3，4 或 5，则使用内置字体。
     //$font = imageloadfont("msyh.ttc");	
	$fontcolor = imagecolorallocate($img,255,0,0);
	$fonttext = rand(0,9); //number 0-9
	//location 
	$x=($i*100)/4+rand(7,15);//width/Max($i)
	$y=rand(7,15);
	//draw font
	imagestring($img,$fontsize,$x,$y,$fonttext,$fontcolor);	
}

//output png picture
imagepng($img);
//destory picture
imagedestroy($img);
?>



//随机生成字符串函数   //定义生成的random长度
function randstr($num=5){
//随机数范围： 26*2字母+10数字
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
//验证时不区分大小写： 所有的字母都转换成大写的。
$randstr="";
for($i=0;$i<$num;$i++){
  $randstr.=substr($chars,rand(0,strlen($chars)),1);
 }
return $randstr;
}
 //font build in size(1-5); coordinate(x,y);color
 //imagestring($image, 5, 30,70,  'A Simple Text String', $fontcolor);
 imagestring($image, 5, 30,70, randstr(), $fontcolor);