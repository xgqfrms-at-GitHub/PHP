<?php 
/**
 * http://php.net/manual/zh/function.json-decode.php
 * 
 * json_decode
 * (PHP 5 >= 5.2.0, PECL json >= 1.2.0, PHP 7)
 * json_decode — 对 JSON 格式的字符串进行编码
 * 
 * 说明 :
 * mixed json_decode ( string $json [, bool $assoc = false [, int $depth = 512 [, int $options = 0 ]]] )
 * 接受一个JSON格式的字符串并且把它转换为PHP变量
 * 
 * 参数 :
 * 1. json 待解码的 json string 格式的字符串。
 * This function only works with UTF-8 encoded data.
 * 
 * 2. assoc
 * 当该参数为 TRUE 时，将返回 array 而非 object 。
 * 
 * 3. depth
 * User specified recursion depth.
 * 
 * 4. options
 * Bitmask of JSON decode options. 
 * Currently only JSON_BIGINT_AS_STRING is supported (default is to cast large integers as floats)
 * 
 * 返回值 :
 * Returns the value encoded in json in appropriate PHP type. 
 * Values true, false and null (case-insensitive) are returned as TRUE, FALSE and NULL respectively. 
 * NULL is returned if the json cannot be decoded or if the encoded data is deeper than the recursion limit.
 * 
 * 范例 :
 * 
 * 
 */


 ?>

<?php
//Example #1 json_decode() 的例子

$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump(json_decode($json));
var_dump(json_decode($json, true));


/**
 * //以上例程会输出：
 * 
 * object(stdClass)#1 (5) {
    ["a"] => int(1)
    ["b"] => int(2)
    ["c"] => int(3)
    ["d"] => int(4)
    ["e"] => int(5)
}
 * 
 * array(5) {
    ["a"] => int(1)
    ["b"] => int(2)
    ["c"] => int(3)
    ["d"] => int(4)
    ["e"] => int(5)
}
 * 
 * test result ?
 object(stdClass)[1]
  public 'a' => int 1
  public 'b' => int 2
  public 'c' => int 3
  public 'd' => int 4
  public 'e' => int 5
 array (size=5)
  'a' => int 1
  'b' => int 2
  'c' => int 3
  'd' => int 4
  'e' => int 5 
 *
 */

?>