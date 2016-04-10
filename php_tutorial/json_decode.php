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
 * 注释 :
 * Note:
 * The JSON spec is not JavaScript, but a subset of JavaScript.
 * Note:
 * In the event of a failure to decode, json_last_error() can be used to determine the exact nature of the error.
 * 
 * 
 * 更新日志 :
 * 版本  说明
 * 5.4.0 The options parameter was added.
 * 5.3.0 Added the optional depth. The default recursion depth was increased from 128 to 512
 * 5.2.3 The nesting limit was increased from 20 to 128
 * 5.2.1 Added support for JSON decoding of basic types.
 * 
 * 参见:
 * json_encode() - 对变量进行 JSON 编码
 * json_last_error() - 返回最后发生的错误
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

<?php
//Example #2 Accessing invalid object properties

$json = '{"foo-bar": 12345}';

$obj = json_decode($json);
print $obj->{'foo-bar'}; // 12345

?>

<?php
//Example #3 common mistakes using json_decode()

// the following strings are valid JavaScript but not valid JSON
// the name and value must be enclosed in double quotes
// single quotes are not valid 
$bad_json = "{ 'bar': 'baz' }";
json_decode($bad_json); // null

// the name must be enclosed in double quotes
$bad_json = '{ bar: "baz" }';
json_decode($bad_json); // null

// trailing commas are not allowed
$bad_json = '{ bar: "baz", }';
json_decode($bad_json); // null

?>


<?php

// the following strings are valid JavaScript but not valid JSON

// the name and value must be enclosed in double quotes
// single quotes are not valid 
$bad_json = "{ 'bar': 'baz' }";
json_decode($bad_json); // null

// the name must be enclosed in double quotes
$bad_json = '{ bar: "baz" }';
json_decode($bad_json); // null

// trailing commas are not allowed
$bad_json = '{ bar: "baz", }';
json_decode($bad_json); // null

?>


<?php
//Example #4 depth errors

// Encode the data.
$json = json_encode(
    array(
        1 => array(
            'English' => array(
                'One',
                'January'
            ),
            'French' => array(
                'Une',
                'Janvier'
            )
        )
    )
);

// Define the errors.
$constants = get_defined_constants(true);
$json_errors = array();
foreach ($constants["json"] as $name => $value) {
    if (!strncmp($name, "JSON_ERROR_", 11)) {
        $json_errors[$value] = $name;
    }
}

// Show the errors for different depths.
foreach (range(4, 3, -1) as $depth) {
    var_dump(json_decode($json, true, $depth));
    echo 'Last error: ', $json_errors[json_last_error()], PHP_EOL, PHP_EOL;
}
?>



<?php
//Example #5 json_decode() of large integers

$json = '12345678901234567890';

var_dump(json_decode($json));
var_dump(json_decode($json, false, 512, JSON_BIGINT_AS_STRING));

?>