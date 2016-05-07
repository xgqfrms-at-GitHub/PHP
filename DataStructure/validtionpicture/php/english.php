<?php
session_start();//must be on the top
//picture type
header('Content-Type: image/png');

//create true color picture
$img = imagecreatetruecolor(200,60)or die('Cannot Initialize new GD image stream');;//width,height
$bgcolor = imagecolorallocate($img,30,30,30);
//draw picture with location
imagefill($img,0,0,$bgcolor);

//fontface 
//$fontface = 'simfang.ttf';// msyh.ttc
$fontface = 'simfang.ttf';// arial.ttf
//$fontface = 'simfang.ttf';simfang.ttf

//chinese DB
//$stringdb = "小喜此回复马努虚机啊看拟赶紧啊没发货就没法公司就看见那个怎么能干嘛给你给你欢我的吗能否还得回家放牛明你的登记卡上看到你哈哈不错的风格和好冷水江市假大空是咯现代男女克隆受累的接近万亿的经典金曲哦是今年暂时阿胶俄文极淡极淡女吗我是是保护对方表示不妨换个说法白色粉色版的库哈斯的发表保护对方表示肌肤看到你说的火车时刻西岗区繁荣没事什么人夫妻关系保湿洁肤水部分";
//chinese DB
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