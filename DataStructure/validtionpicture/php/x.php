<?php
//header — 发送一个自定义的http报文
header ('Content-Type: image/png');

//imagecreatetruecolor — 新建一个真彩色图像
$im = @imagecreatetruecolor(300, 100)
      or die('Cannot Initialize new GD image stream');
	  
//imagecolorallocate — 为一幅图像分配颜色	  
$text_color = imagecolorallocate($im, 233, 14, 91);

//imagestring — 水平地画一行字符串
imagestring($im, 1, 5, 5,  'A Simple Text String', $text_color);

//imagepng — 以 PNG 格式将图像输出到浏览器或文件
imagepng($im);

//imagedestroy — 销毁一图像
imagedestroy($im);

?> 