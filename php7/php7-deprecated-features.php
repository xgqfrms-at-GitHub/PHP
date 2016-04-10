<?php 
/**
 * http://www.runoob.com/php/php-deprecated-features.html
 * PHP 7 废弃特性
 * 
 * 1. PHP4 风格的构造函数
 * 
 * 在 PHP4 中类中的函数可以与类名同名，这一特性在 PHP7 中被废弃，同时会发出一个 E_DEPRECATED 错误。
 * 当方法名与类名相同，且类不在命名空间中，同时PHP5的构造函数（__construct）不存在时，会产生一个 E_DEPRECATED 错误。 
 * 
 * 2. 以静态的方式调用非静态方法
 * 
 * 以静态的方式调用非静态方法，不再支持：
 * 
 * 3. password_hash() 随机因子选项
 * 
 * 函数原 salt 量不再需要由开发者提供了。函数内部默认带有 salt 能力，无需开发者提供 salt 值。 
 * 
 * 4. capture_session_meta SSL 上下文选项
 * 
 * 废弃了 "capture_session_meta" SSL 上下文选项。
 * 在流资源上活动的加密相关的元数据可以通过 stream_get_meta_data() 的返回值访问。
 * 
 */


 ?>

<?php
//PHP4 风格的构造函数
	class A {
	   function A() {
	      print('Style Constructor');
	   }
	}
?> 

<?php
//以静态的方式调用非静态方法
	class A {
	   function b() {
	      print('Non-static call');
	   }
	}
	A::b();
?> 