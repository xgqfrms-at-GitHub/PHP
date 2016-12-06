<?php 
/**
 * http://www.runoob.com/php/php-error-handling.html
 * 
 * PHP 7 错误处理
 * 
 * PHP 7 改变了大多数错误的报告方式。不同于 PHP 5 
 *传统错误报告机制，现在大多数错误被作为 Error 异常抛出。
 * 这种 Error 异常可以像普通异常一样被 try / catch 所捕获。如果没有匹配的 try / catch 块，
 * 则调用异常处理函数（由 set_exception_handler() 注册）进行处理。 
 * 如果尚未注册异常处理函数，则按照传统方式处理：被报告为一个致命错误（Fatal Error）。
 * 
 * Error 类并不是从 Exception 类 扩展出来的，所以用 catch (Exception $e) { ... } 这样的代码是捕获不 到 Error 的。
 * 你可以用 catch (Error $e) { ... } 这样的代码，或者通过注册异常处理函数（ set_exception_handler()）来捕获 Error。 
 */



 ?>