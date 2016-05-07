<?php搜索
session_start();
$enablegd = 1;
//判断图像处理函数是否存在
$funcs = array('imagecreatetruecolor','imagecolorallocate','imagefill','imagestring','imageline','imagerotate','imagedestroy','imagecolorallocatealpha','imageellipse','imagepng');
foreach($funcs as $func){ if(!function_exists($func)) {  $enablegd = 0;  break; }}ob_clean(); 
//清理缓冲
if($enablegd){ 
//create captcha 
$consts = 'cdfgkmnpqrstwxyz23456';
 $vowels = 'aek23456789'; 
for ($x = 0; $x < 6; $x++) {  $const[$x] = substr($consts, mt_rand(0,strlen($consts)-1),1); 
//获取$consts中的一个随机数  
$vow[$x] = substr($vowels, mt_rand(0,strlen($vowels)-1),1);
 //获取$vowels中的一个随机数
 } $radomstring = $const[0] . $vow[0] .$const[2] . $const[1] . $vow[1] . $const[3] . $vow[3] . $const[4]; $_SESSION['checkcode'] = $string = substr($radomstring,0,4);
 //显示4个字符 
$imageX = strlen($radomstring)*8;
 //图像的宽
$imageY = 20;      
//图像的高 
$im = imagecreatetruecolor($imageX,$imageY); 
//新建一个真彩色图像 
//creates two variables to store color
 $background = imagecolorallocate($im, rand(180, 250), rand(180, 250), rand(180, 250));
 //背景色
 $foregroundArr = array(imagecolorallocate($im, rand(0, 20), rand(0, 20), rand(0, 20)),  imagecolorallocate($im, rand(0, 20), rand(0, 10), rand(245, 255)),  imagecolorallocate($im, rand(245, 255), rand(0, 20), rand(0, 10)),  imagecolorallocate($im, rand(245, 255), rand(0, 20), rand(245, 255)) ); $foreground2 = imagecolorallocatealpha($im, rand(20, 100), rand(20, 100), rand(20, 100),80);
 //分配颜色并说明透明度 
$middleground = imagecolorallocate($im, rand(200, 160), rand(200, 160), rand(200, 160)); 
//中间背景 
$middleground2 = imagecolorallocatealpha($im, rand(180, 140), rand(180, 140), rand(180, 140),80); 
//中间背景2 //与左上角的颜色相同的都会被填充 
imagefill($im, 0, 0, imagecolorallocate($im, 250, 253, 254));
 //往图像上写入文字 
imagettftext($im, 12, rand(30, -30), 5, rand(14, 16), $foregroundArr[rand(0,3)], XINCHENG_ROOT.'include/fonts/ALGER.TTF', $string[0]);
 imagettftext($im, 12, rand(50, -50), 20, rand(14, 16), $foregroundArr[rand(0,3)], XINCHENG_ROOT.'include/fonts/ARIALNI.TTF', $string[1]); imagettftext($im, 12, rand(50, -50), 35, rand(14, 16), $foregroundArr[rand(0,3)], XINCHENG_ROOT.'include/fonts/ALGER.TTF', $string[2]); 
imagettftext($im, 12, rand(30, -30), 50, rand(14, 16), $foregroundArr[rand(0,3)], XINCHENG_ROOT.'include/fonts/arial.ttf', $string[3]); 
//画边框 
$border = imagecolorallocate($im, 133, 153, 193); 
imagerectangle($im, 0, 0, $imageX - 1, $imageY - 1, $border); 
//画一些随机出现的点 
$pointcol = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255)); 
for ($i=0;$i<80;$i++) {  imagesetpixel($im,rand(2,$imageX-2),rand(2,$imageX-2),$pointcol); } 
//画随机出现的线 

for ($x=0; $x<9;$x++) {  if(mt_rand(0,$x)%2==0)  {   imageline($im, rand(0, 120), rand(0, 120), rand(0, 120), rand(0, 120), rand(0, 999999)); 
//画线   
imageellipse($im, rand(0, 120), rand(0, 120), rand(0, 120), rand(0, 120), $middleground2); 
//画椭圆 
 }  else  {   imageline($im, rand(0, 120), rand(0, 120), rand(0, 120), rand(0, 120), rand(0, 999999));
   imageellipse($im, rand(0, 120), rand(0, 120), rand(0, 120), rand(0, 120), $middleground);  } } 
//output to browser 
header("content-type:image/png\r\n"); 
imagepng($im); imagedestroy($im);}else{ $files = glob(XINCHENG_ROOT.'images/checkcode/*.jpg'); 
if(!is_array($files)) die('请检查文件目录完整性:/images/checkcode/'); 
$checkcodefile = $files[rand(0, count($files)-1)]; 
//随机其中一个文件
 $_SESSION['checkcode'] = substr(basename($checkcodefile), 0, 4);
 //获得文件名 
header("content-type:image/jpeg\r\n"); 
include $checkcodefile;}
?>