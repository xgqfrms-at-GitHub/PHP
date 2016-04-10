<?php
/**
* crypt encode algorithm
* reference link: http://php.net/manual/zh/function.crypt.php
* 
* crypt
* (PHP 4, PHP 5, PHP 7)
* crypt — 单向字符串散列
* 
* 说明 :

string crypt ( string $str [, string $salt ] )
crypt() 返回一个基于标准 UNIX DES 算法或系统上其他可用的替代算法的散列字符串。

salt 参数是可选的。然而，如果没有salt的话，crypt()创建出来的会是弱密码。 php 5.6及之后的版本会在没有它的情况下抛出一个 E_NOTICE 级别的错误。为了更好的安全性，请确保指定一个足够强度的盐值。

password_hash()使用了一个强的哈希算法，来产生足够强的盐值，并且会自动进行合适的轮次。password_hash()是crypt()的一个简单封装，并且完全与现有的密码哈希兼容。推荐使用password_hash()。

有些系统支持不止一种散列类型。实际上，有时候，基于 MD5 的算法被用来替代基于标准 DES 的算法。这种散列类型由盐值参数触发。在 5.3 之前，PHP 在安装时根据系统的 crypt() 决定可用的算法。如果没有提供盐值，PHP 将自动生成一个 2 个字符（DES）或者 12 个字符（MD5）的盐值 ，这取决于 MD5 crypt() 的可用性。PHP 设置了一个名为 CRYPT_SALT_LENGTH 的常量，用来表示可用散列允许的最长可用盐值。

基于标准 DES 算法的 crypt() 在输出内容的开始位置返回两个字符的盐值。它也只使用 str 的开始 8 个字符，所以更长的以相同 8 个字符开始的字符串也将生成相同的结果（当使用了相同的盐值时）。

在 crypt() 函数支持多重散列的系统上，下面的常量根据相应的类型是否可用被设置为 0 或 1：

CRYPT_STD_DES - 基于标准 DES 算法的散列使用 "./0-9A-Za-z" 字符中的两个字符作为盐值。在盐值中使用非法的字符将导致 crypt() 失败。
CRYPT_EXT_DES - 扩展的基于 DES 算法的散列。其盐值为 9 个字符的字符串，由 1 个下划线后面跟着 4 字节循环次数和 4 字节盐值组成。它们被编码成可打印字符，每个字符 6 位，有效位最少的优先。0 到 63 被编码为 "./0-9A-Za-z"。在盐值中使用非法的字符将导致 crypt() 失败。
CRYPT_MD5 - MD5 散列使用一个以 $1$ 开始的 12 字符的字符串盐值。
CRYPT_BLOWFISH - Blowfish 算法使用如下盐值：“$2a$”，一个两位 cost 参数，“$” 以及 64 位由 “./0-9A-Za-z” 中的字符组合而成的字符串。在盐值中使用此范围之外的字符将导致 crypt() 返回一个空字符串。两位 cost 参数是循环次数以 2 为底的对数，它的范围是 04-31，超出这个范围将导致 crypt() 失败。 PHP 5.3.7 之前只支持 “$2a$” 作为盐值的前缀，PHP 5.3.7 开始引入了新的前缀来修正一个在Blowfish实现上的安全风险。可以参考» this document来了解关于这个修复的更多信息。总而言之，开发者如果仅针对 PHP 5.3.7及之后版本进行开发，那应该使用 “$2y$” 而非 “$2a$”
CRYPT_SHA256 - SHA-256 算法使用一个以 $5$ 开头的 16 字符字符串盐值进行散列。如果盐值字符串以 “rounds=<N>$” 开头，N 的数字值将被用来指定散列循环的执行次数，这点很像 Blowfish 算法的 cost 参数。默认的循环次数是 5000，最小是 1000，最大是 999,999,999。超出这个范围的 N 将会被转换为最接近的值。
CRYPT_SHA512 - SHA-512 算法使用一个以 $6$ 开头的 16 字符字符串盐值进行散列。如果盐值字符串以 “rounds=<N>$” 开头，N 的数字值将被用来指定散列循环的执行次数，这点很像 Blowfish 算法的 cost 参数。默认的循环次数是 5000，最小是 1000，最大是 999,999,999。超出这个范围的 N 将会被转换为最接近的值。
* 
* Note:
* 从 PHP 5.3.0 起，PHP 包含了它自己的实现，并将在系统缺乏相应算法支持的时候使用它自己的实现。
* 
* 
* 参数 ¶

str
待散列的字符串。

Caution
使用 CRYPT_BLOWFISH 算法将导致str被裁剪为一个最长72个字符的字符串。
salt
可选的盐值字符串。如果没有提供，算法行为将由不同的算法实现决定，并可能导致不可预料的结束。

返回值 ¶

返回散列后的字符串或一个少于 13 字符的字符串，从而保证在失败时与盐值区分开来。

Warning
当校验密码时，应该使用一个不容易被时间攻击的字符串比较函数来比较crypt()的输出与之前已知的哈希。出于这个目的，PHP5.6开始提供了hash_equals()。
更新日志 ¶

版本	说明
5.6.5	When the failure string "*0" is given as the salt, "*1" will now be returned for consistency with other crypt implementations. Prior to this version, PHP 5.6 would incorrectly return a DES hash.
5.6.0	Raise E_NOTICE security warning if salt is omitted.
5.5.21	When the failure string "*0" is given as the salt, "*1" will now be returned for consistency with other crypt implementations. Prior to this version, PHP 5.5 (and earlier branches) would incorrectly return a DES hash.
5.3.7	Added $2x$ and $2y$ Blowfish modes to deal with potential high-bit attacks.
5.3.2	基于 Ulrich Drepper 的» 实现，新增基于 SHA-256 算法和 SHA-512 算法的 crypt。
5.3.2	修正了 Blowfish 算法由于非法循环导致的问题，返回“失败”字符串（“*0” 或 “*1”）而不是转而使用 DES 算法。
5.3.0	PHP 现在包含了它自己的 MD5 Crypt 实现，包括标准 DES 算法，扩展的 DES 算法以及 Blowfish 算法。如果系统缺乏相应的实现，那么 PHP 将使用它自己的实现。
范例 ¶
* 
* 
* 
*注释 ¶

Note: 由于 crypt() 使用的是单向算法，因此不存在 decrypt 函数。 
* 
* 
* 
* 参见 ¶

hash_equals() - 可防止时序攻击的字符串比较
password_hash() - 创建密码的哈希（hash）
md5() - 计算字符串的 MD5 散列值
Mcrypt 扩展
更多关于 crypt 函数的信息，请阅读 Unix man 页面
* 
* 
* 
* 
* 
* 
* 
* 
* 
* 
* 
* 
* 
* 
*/

//*****************************************************************************************//

/**
crypt();
*/
//? CRYPT_STD_DES, CRYPT_EXT_DES, CRYPT_MD5, CRYPT_BLOWFISH, CRYPT_SHA256, CRYPT_SHA512
$c_type = "CRYPT_SHA512";
$pwd = "Abc@123#xyz&789";

// ($new_salt = ) ? ( 'value' 单引号 正确) : ( "value" 双引号 错误)
$new_salt = '$6$rounds=5000$*xxx@ufo.xxx*salt$';
//单引号 正确
//$6$rounds=5000$*xxx@ufo.xxx*sal$ZFZxnZkOIwuL8GC5.apfC1EW7iB6pDGOO2F3HTrgOpU2iPlEK/LAXAdkZQrLueSBvqKhZ6/Z7kj0KKXdnKFiM.

// $new_salt = "$6$rounds=5000$*xxx@ufo.xxx*salt$";
//双引号 错误 
//$6XacUGSte4ew

/*Example #3 以不同散列类型使用 crypt()*/

if(CRYPT_SHA512 === 1){
	$encode_pwd = crypt($pwd,$new_salt);
	echo "{$c_type}: {$encode_pwd}\n<br/><br/>";
}else{
	echo "{$c_type}: not supported.\n<br/><br/>";
}
//*****************************************************************************************//

// 2 字符 salt
if (CRYPT_STD_DES == 1){
	$s_des = crypt('something','st');
	echo "Standard DES(2): {$s_des}\n<br/><br/>";
}else{
	echo "Standard DES not supported.\n<br/><br/>";
}

// 4 字符 salt
if (CRYPT_EXT_DES == 1){
	$e_des = crypt('something','_S4..some');
	echo "Extended DES(4): {$e_des}\n<br/><br/>";
}else{
	echo "Extended DES not supported.\n<br/><br/>";
}

//以 $1$ 开始的 12 字符
if (CRYPT_MD5 == 1){
	$md5 = crypt('something','$1$somethin$');
	echo "MD5 (12): {$md5}\n<br/><br/>";
}else{
	echo "MD5 not supported.\n<br/><br/>";
}


// 以 $2a$ 开始的 Salt。双数字的 cost 参数：09. 22 字符
if (CRYPT_BLOWFISH == 1){
	$blowfish = crypt('something','$2a$09$anexamplestringforsalt$');
	echo "Blowfish (22): {$blowfish}\n<br/><br/>";
}else{
	echo "Blowfish DES not supported.\n<br/><br/>";
}


// 以 $5$ 开始的 16 字符 salt。周长的默认数是 5000。
if (CRYPT_SHA256 == 1){
	$sha256 = crypt('something','$5$rounds=5000$anexamplestringforsalt$');
	echo "SHA-256 (16): {$sha256}\n<br/><br/>";
}else{
	echo "SHA-256 not supported.\n<br/><br/>";
}


// 以 $6$ 开始的 16字符 salt。周长的默认数是 5000。
if (CRYPT_SHA512 == 1){
	$sha512_salt = '$6$rounds=5000$anexamplestringforsalt$';
	//单引号 正确
	//$6$rounds=5000$anexamplestringf$Oo0skOAdUFXkQxJpwzO05wgRHG0dhuaPBaOU/oNbGpCEKlf/7oVM5wn6AN0w2vwUgA0O24oLzGQpp1XKI6LLQ0

	// $sha512_salt = "$6$rounds=5000$anexamplestringforsalt$";
	//双引号 错误 
	//$6FywGN86JcQI
	$sha512 = crypt('something',$sha512_salt);
	echo "SHA-512 (16): {$sha512}\n<br/><br/>";
}else{
	echo "SHA-512 not supported.";
}

//*****************************************************************************************//
// 测试结果

/*
	Standard DES: stqAdD7zlbByI 
	Extended DES: _S4..someQXidlBpTUu6 
	MD5: $1$somethin$4NZKrUlY6r7K7.rdEOZ0w. 
	Blowfish: $2a$09$anexamplestringforsaleLouKejcjRlExmf1671qw3Khl49R3dfu 
	SHA-256: $5$rounds=5000$anexamplestringf$KIrctqsxo2wrPg5Ag/hs4jTi4PmoNKQUGWFXlVy9vu9 
	SHA-512: $6$rounds=5000$anexamplestringf$Oo0skOAdUFXkQxJpwzO05wgRHG0dhuaPBaOU/oNbGpCEKlf/7oVM5wn6AN0w2vwUgA0O24oLzGQpp1XKI6LLQ0
*/


?>



<?php
/*Example #1 crypt() 范例*/

$hashed_password = crypt('mypassword'); // 自动生成盐值

/* 你应当使用 crypt() 得到的完整结果作为盐值进行密码校验，以此来避免使用不同散列算法导致的问题。（如上所述，基于标准 DES 算法的密码散列使用 2 字符盐值，但是基于 MD5 算法的散列使用 12 个字符盐值。）*/
if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
   echo "Password verified!";
}



?>


<?php
/*Example #2 利用 htpasswd 进行 crypt() 加密*/

// 设置密码
$password = 'mypassword';

// 获取散列值，使用自动盐值
$hash = crypt($password);
?>