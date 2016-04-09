<?php
/**
*crypt encode algorithm
* 
* 
* reference link: http://php.net/manual/zh/function.crypt.php
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