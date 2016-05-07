<?php
 session_start();
 class validimg
{
//var $image = imagecreatetruecolor(100,30)or die('Cannot Initialize new GD image stream');
 //背景图片目录
var $backgroundpath = 'validbg';
 //生成验证码宽度
var $width ='80';
 //生成验证码高度
var $height ='25';
 //背景
var $background ;
//= imagecolorallocate($image,255,0,0);
 //验证文本
var $text='abcd';
 //字体目录
var $fontpath = 'validbg';
 //字体
var $font='simhei.ttf';
 //字体宽度
var $font_width = '20';

function validimg($text)
 {
 $this->text = $text;
 //随机选取一个背景文件
$bgdir =  @dir($this->backgroundpath);
while(false!==($image=$bgdir->read()))
 {
 if($image != '.' && $image != '..' && $this->checktype($image) != false)
 {
 $backgroundarr[] = $image;

}
 }
 $bgdir->close();
 //随机选取一个字体文件
$fonts =  @dir($this->fontpath);
 while(false !== ($font = $fonts ->read()))
 {
 if($font != '.' && $font != '..' && $this->checktype($font,'FONT') != false)
 {
 $fontsarr[] = $font;
 }
 }
 $fonts->close();
 $this->font = $fontsarr[array_rand($fontsarr,1)];
 $this->background = $backgroundarr[array_rand($backgroundarr,1)];

$this->output();
 }

//创建背景图像handdle
 function createbackground()
 {
 switch ($this->checktype($this->background))
 {
 case 'jpg':
 $bghanddle = @imagecreatefromjpeg( $this->backgroundpath.'/'.$this->background);
 break;
 case 'gif':
 $bghanddle = @imagecreatefromgif( $this->backgroundpath.'/'.$this->background);
 break;
 case 'png':
 $bghanddle = @imagecreatefrompng( $this->backgroundpath.'/'.$this->background);
 break;
 default:
 }
 return $bghanddle;
 }
 //检查文件类型
function checktype( $image,$type = 'IMAGE')
 {
 $ext = substr( $image, strrpos($image,'.')+1);
 if($type == 'IMAGE')
 {
  if ($ext == 'jpg' || $ext =='gif' || $ext =='png'){
	  return $ext;
  }
  else {
	  return false;
  }
 }else if($type == 'FONT'){
  if ($ext == 'ttf'){
	  return $ext;
  }

 else {
	 return false;
 }
 }
 }
 //输出
function output()
 {
 header("content-type:image/png;");
 //生成图像
$img = @imagecreatetruecolor( $this->width,$this->height);
 $bghanddle = $this->createbackground();
 //从背景图像随机位置载入一块作为背景
if($bghanddle)
 {
 $randx = rand(0,(imagesx($bghanddle) - ($this->width)));//中文 - 错误
 $randy = rand(0,(imagesy($bghanddle) - ($this->height)));
 }
 imagecopy($img,$bghanddle,0,0,$randx,$randy,$this->width,$this->height);
 //随机选择角度 字体大小 坐标输出文字
for($i=0;$i<strlen($this->text);$i++)
 {
 $angle = rand(-30,30);
 $fontsize = rand(15,20);
 $x = rand($this->font_width*$i,$this->font_width*$i+10);
 $color = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
 imagettftext($img,$fontsize,$angle,$x,20,$color,$this->fontpath.'/'.$this->font,substr($this->text,$i,1));
 }
 imagepng($img);
 //释放资源
 imagedestroy($img);
 imagedestroy($bghanddle);
 }
}

new validimg($_SESSION['valid']);
?>