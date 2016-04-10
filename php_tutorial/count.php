<?php 
/**
 * http://php.net/manual/zh/function.count.php
 * 
 * count
 * (PHP 4, PHP 5, PHP 7)
 * count — 计算数组中的单元数目或对象中的属性个数
 * 
 * 说明 :
 * int count ( mixed $var [, int $mode = COUNT_NORMAL ] )
 * 统计一个数组里的所有元素，或者一个对象里的东西。
 * 
 * 对于对象，如果安装了 SPL，可以通过实现 Countable 接口来调用 count()。
 * 该接口只有一个方法 Countable::count()，此方法返回 count() 函数的返回值。
 * 
 * 关于 PHP 中如何实现和使用数组可以参考手册中数组章节中的详细描述。
 * 
 * 参数 :
 * var
 * 数组或者对象。
 * mode
 * 如果可选的 mode 参数设为 COUNT_RECURSIVE（或 1），count() 将递归地对数组计数。
 * 对计算多维数组的所有单元尤其有用。mode 的默认值是 0。count() 识别不了无限递归。
 * 
 * 返回值 :
 * 返回 var 中的单元数目。 
 * 如果 var 不是数组类型或者实现了 Countable 接口的对象，将返回 1，有一个例外，如果 var 是 NULL 则结果是 0。
 * Caution : count() 对没有初始化的变量返回 0，但对于空的数组也会返回 0。
 * 用 isset() 来测试变量是否已经初始化。
 * 
 * 更新日志 :
 * 版本	  说明
 * 4.2.0  添加了可选的 mode 参数。
 * 
 * 
 * 参见 :
 * is_array() - 检测变量是否是数组
 * http://php.net/manual/zh/function.is-array.php
 * 
 * isset() - 检测变量是否设置
 * http://php.net/manual/zh/function.isset.php
 * 
 * strlen() - 获取字符串长度
 * http://php.net/manual/zh/function.strlen.php
 */


 ?>

 

<?php

//范例
//Example #1 count() 例子

$a[0] = 1;
$a[1] = 3;
$a[2] = 5;
$result = count($a);
// $result == 3
echo $result."<br/>";

$b[0]  = 7;
$b[5]  = 9;
$b[10] = 11;
$result = count($b);
// $result == 3
echo $result."<br/>";

$result = count(null);
// $result == 0
echo $result."<br/>";

$result = count(false);
// $result == 1
echo $result."<br/>";
?>


<?php
//Example #2 递归 count() 例子

$food = array('fruits' => array('orange', 'banana', 'apple'),
              'veggie' => array('carrot', 'collard', 'pea'));

// recursive count
echo count($food, COUNT_RECURSIVE)."<br/>"; // output 8 (2+6)

// normal count
echo count($food)."<br/>"; // output 2


?>