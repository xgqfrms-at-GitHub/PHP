<?php
// 两字符 salt
if (CRYPT_STD_DES == 1)
{
echo "Standard DES: ".crypt('something','st')."\n<br>";
}
else
{
echo "Standard DES not supported.\n<br>";
}

// 4 字符 salt
if (CRYPT_EXT_DES == 1)
{
echo "Extended DES: ".crypt('something','_S4..some')."\n<br>";
}
else
{
echo "Extended DES not supported.\n<br>";
}

//以 $1$ 开始的 12 字符
if (CRYPT_MD5 == 1)
{
echo "MD5: ".crypt('something','$1$somethin$')."\n<br>";
}
else
{
echo "MD5 not supported.\n<br>";
}

// 以 $2a$ 开始的 Salt。双数字的 cost 参数：09. 22 字符
if (CRYPT_BLOWFISH == 1)
{
echo "Blowfish: ".crypt('something','$2a$09$anexamplestringforsalt$')."\n<br>";
}
else
{
echo "Blowfish DES not supported.\n<br>";
}

// 以 $5$ 开始的 16 字符 salt。周长的默认数是 5000。
if (CRYPT_SHA256 == 1)
{
echo "SHA-256: ".crypt('something','$5$rounds=5000$anexamplestringforsalt$')."\n<br>"; }
else
{
echo "SHA-256 not supported.\n<br>";
}

// 以 $5$ 开始的 16 字符 salt。周长的默认数是 5000。
if (CRYPT_SHA512 == 1)
{
echo "SHA-512: ".crypt('something','$6$rounds=5000$anexamplestringforsalt$');
}
else
{
echo "SHA-512 not supported.";
}

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