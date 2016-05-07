<?php
//header — 发送一个自定义的http报文
header("Content-type: image/png");

//imagecreate — 新建一个基于调色板的图像
$im = @imagecreate(400, 200)
    or die("Cannot Initialize new GD image stream");
	
//imagecolorallocate — 为一幅图像分配颜色
$background_color = imagecolorallocate($im, 204, 204, 204);

//imagecolorallocate — 为一幅图像分配颜色
$text_color = imagecolorallocate($im, 0, 255, 0);

//imagestring — 水平地画一行字符串
imagestring($im, 5, 100, 50,  'A Simple Text String', $text_color);

//imagepng — 以 PNG 格式将图像输出到浏览器或文件
imagepng($im);

//imagedestroy — 销毁一图像
imagedestroy($im);
?> 