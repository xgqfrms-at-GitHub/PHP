<?php 
/**
 * http://www.runoob.com/php/php-spaceship-operator.html
 * 
 * PHP 太空船运算符（组合比较符）
 * 
 * PHP 7 新增加的太空船运算符（组合比较符）用于比较两个表达式 $a 和 $b，
 * 如果 $a 小于、等于或大于 $b时，它分别返回-1、0或1。
 * 
 */


 ?>

 <?php
// 整型比较
print( 1 <=> 1);print(PHP_EOL);
print( 1 <=> 2);print(PHP_EOL);
print( 2 <=> 1);print(PHP_EOL);
print(PHP_EOL); // PHP_EOL 为换行符

// 浮点型比较
print( 1.5 <=> 1.5);print(PHP_EOL);
print( 1.5 <=> 2.5);print(PHP_EOL);
print( 2.5 <=> 1.5);print(PHP_EOL);
print(PHP_EOL);

// 字符串比较
print( "a" <=> "a");print(PHP_EOL);
print( "a" <=> "b");print(PHP_EOL);
print( "b" <=> "a");print(PHP_EOL);
?>