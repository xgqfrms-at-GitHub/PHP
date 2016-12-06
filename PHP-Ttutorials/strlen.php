<?php 

//http://php.net/manual/zh/function.strlen.php
/**
 *(PHP 4, PHP 5, PHP 7)
 * strlen — 获取字符串长度
 * 
 * 说明 
 * int strlen ( string $string )
 * 返回给定的字符串 string 的长度。
 * 
 * 参数 
 * string
 * 需要计算长度的字符串。
 * 
 * 返回值 
 * 成功则返回字符串 string 的长度；如果 string 为空，则返回 0。
 * 
 * 注释 
 * Note: 
 * strlen() returns the number of bytes rather than the number of characters in a string.
 * Note:
 * strlen() returns NULL when executed on arrays, and an E_WARNING level error is emitted.
 * 
 * 参见
 * count() - 计算数组中的单元数目或对象中的属性个数 
 * http://php.net/manual/zh/function.count.php
 * 
 * mb_strlen() - 获取字符串的长度
 * http://php.net/manual/zh/function.mb-strlen.php
 * 
 */


$str_l = '$2y$12$wMXyIUwD69GSypjhAQmOLeG5eB4jaKftJsyBvSdE6AoRrM4Mm.d9O';//单引号，正确
$str_2 = "$2y$12$wMXyIUwD69GSypjhAQmOLeG5eB4jaKftJsyBvSdE6AoRrM4Mm.d9O";//双引号，错误
echo "\n<br/>";
echo "单引号，正确\n<br/>";
echo  strlen($str_l);
echo "\n<br/>";
echo "双引号，错误\n<br/>";
echo  strlen($str_2); 

 ?>

<?php
//Example #1 strlen() 范例
$str = 'abcdef';
echo "\n<br/>{$str}:";
echo strlen($str); // 6

$str = ' ab cd ';
echo "\n<br/>{$str}:(3 space)";
echo strlen($str); // 7
?>



<?php
//Example #2 递归 count() 例子

$food = array('fruits' => array('orange', 'banana', 'apple'),
              'veggie' => array('carrot', 'collard', 'pea'));

// recursive count
echo "\n<br/>";
echo count($food, COUNT_RECURSIVE); // output 8

// normal count
echo "\n<br/>";
echo count($food); // output 2

?>