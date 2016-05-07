<?php
 //不兼容utf-8,只可以使用utf-8 无 BOM格式
 //create picture with size,exception handler
 $image = imagecreatetruecolor(400,200)or die('Cannot Initialize new GD image stream');

 //image format
  header('Content-Type: image/png');
 
 //fontcolor RGB
 $fontcolor = imagecolorallocate($image,255,0,0);
 
 //background color RGBA
 $bgcolor = imagecolorallocatealpha($image,255,255,255,0.5);
 
 //change default background color
 imagefill($image,0,0,$bgcolor); 
//随机生成字符串函数
 function randstr($num=5){
  //定义生成的random长度
  
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
 
//random font 
for($i=0;$i<4;$i++){
	$fontsize = 6;
	$fontcolor = imagecolorallocate($image,255,0,0);
	$fontcontent = rand(0,9);
	
	//随机坐标
	$x =($i*100/4)+rand(5,10);
	$y =rand(5,10);
	imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
//disturb element  pixel/line
//pixel 多
for($i=0;$i<200;$i++){
	$pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
	//指定颜色范围 深色
	imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);
	//点 坐标
	//imagesetbrush();
	
}
//line 少
for($i=0;$i<3;$i++){
	$linecolor = imagecolorallocate($image,rand(80,200),rand(80,200),rand(80,200));
	//浅色
	imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
	//两点坐标 确定一条线
}

 //output png image
 imagepng($image);
 
 //destory
 imagedestroy($image);

 ///*

?>
<pre>
//干扰线 
function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick = 1)
{
    /* 下面两行只在线段直角相交时好使
    imagesetthickness($image, $thick);
    return imageline($image, $x1, $y1, $x2, $y2, $color);
    */
    if ($thick == 1) {
        return imageline($image, $x1, $y1, $x2, $y2, $color);
    }
    $t = $thick / 2 - 0.5;
    if ($x1 == $x2 || $y1 == $y2) {
        return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
    }
    $k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
    $a = $t / sqrt(1 + pow($k, 2));
    $points = array(
        round($x1 - (1+$k)*$a), round($y1 + (1-$k)*$a),
        round($x1 - (1-$k)*$a), round($y1 - (1+$k)*$a),
        round($x2 + (1+$k)*$a), round($y2 - (1-$k)*$a),
        round($x2 + (1-$k)*$a), round($y2 + (1+$k)*$a),
    );
    imagefilledpolygon($image, $points, 4, $color);
    return imagepolygon($image, $points, 4, $color);
}


</pre>