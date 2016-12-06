<?php
//http://www.runoob.com/php/php-variables.html

$x=5; // 全局作用域

function myTest() {
  $y=10; // 局部作用域
  echo "<p>测试函数内部的变量：</p>";
  echo "变量 x 是：$x";
  echo "<br>";
  echo "变量 y 是：$y";
} 

myTest();

echo "<p>测试函数之外的变量：</p>";
echo "变量 x 是：$x";
echo "<br>";
echo "变量 y 是：$y";

/**
 * global 关键字用于函数内访问全局变量。
 * 在函数内调用函数外定义的全局变量，我们需要在函数中的变量前加上 global 关键字：
 * 
 */ 

function myTest_global() {
  global $x; // 全局作用域
  $z=7; // 局部作用域
  echo "<p>使用global，测试函数之外的变量：</p>";
  echo "global变量 x 是：$x";
  echo "<p>测试函数内部的变量：</p>";
  echo "变量 z 是：$z";
} 
myTest_global();
echo "<br>";

/**
 * PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。
 * index 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。
 * 
 * 
 * 
 */ 
/**
 * Static 作用域
 * 当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除。
 * 要做到这一点，请在您第一次声明变量时使用 static 关键字：
 * 
 * 然后，每次调用该函数时，该变量将会保留着函数前一次被调用时的值。
 * 注释：该变量仍然是函数的局部变量。
 */
function myTest_static(){
	static $x=0;
	echo $x;
	$x++;
}

myTest_static();
echo "<br>";
myTest_static();
echo "<br>";
myTest_static();
echo "<br>";

/**
 *参数作用域
 * 参数是通过调用代码将值传递给函数的局部变量。
 * 参数是在参数列表中声明的，作为函数声明的一部分：
 * 
 * 
 * 
 */
function myTest_parameter($x){
echo $x;
echo "<br>";
}

myTest_parameter(3721);

?>