<?php 
/**
 * http://php.net/manual/zh/function.password-verify.php
 * 
 * password_verify
 * (PHP 5 >= 5.5.0, PHP 7)
 * password_verify — 验证密码是否和哈希匹配
 * 
 * 说明 :
 * boolean password_verify ( string $password , string $hash )
 * 验证密码是否和指定的哈希值匹配。
 * 
 * 注意 password_hash() 返回的哈希包含了算法、 cost 和盐值。
 * 因此，所有需要的信息都包含内。使得验证函数不需要储存额外盐值等信息即可验证哈希。
 * 
 * 时序攻击（timing attacks）对此函数不起作用。
 * 
 * 参数 :
 * password 用户的密码。
 * hash 一个由 password_hash() 创建的散列值。
 * 
 * 返回值 :
 * 如果密码和哈希匹配则返回 TRUE，否则返回 FALSE 。
 * 
 * 范例
 *  
 * 参见 :
 * password_hash() - 创建密码的哈希（hash）
 * » 用户使用
 * 
 * 
 * 
 */

 ?>


<?php
//Example #1 password_verify() 例子

// 想知道以下字符从哪里来，可参见 password_hash() 的例子
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>