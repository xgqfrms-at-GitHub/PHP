<?php
/**
 * 这个例子对服务器做了基准测试（benchmark），检测服务器能承受多高的 cost
 * 在不明显拖慢服务器的情况下可以设置最高的值
 * 8-10 是个不错的底线，在服务器够快的情况下，越高越好。
 * 以下代码目标为  ≤ 50 毫秒（milliseconds），
 * 适合系统处理交互登录。
 * reference link: http://php.net/manual/zh/function.password-hash.php
 * test result: Appropriate Cost Found: 10
 */
$timeTarget = 0.05; // 50 毫秒（milliseconds） 

$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost . "\n";

/**
 * (PHP 5 >= 5.5.0, PHP 7)
 * password_hash — 创建密码的哈希（hash）
 * 
 * 说明:
 * string password_hash ( string $password , integer $algo [, array $options ] )
 * password_hash() 使用足够强度的单向散列算法创建密码的哈希（hash）。
 * password_hash() 兼容 crypt()。所以， crypt() 创建的密码哈希也可用于 password_hash()。
 * 
 * 当前支持的算法：
 * 1. PASSWORD_DEFAULT - 使用 bcrypt 算法 (PHP 5.5.0 默认)。
 * 注意，该常量会随着 PHP 加入更新更高强度的算法而改变。 
 * 所以，使用此常量生成结果的长度将在未来有变化。 因此，数据库里储存结果的列可超过60个字符（最好是255个字符）。
 * 
 * 2. PASSWORD_BCRYPT - 使用 CRYPT_BLOWFISH 算法创建哈希。
 * 这会产生兼容使用 "$2y$" 的 crypt()。 结果将会是 60 个字符的字符串， 或者在失败时返回 FALSE。
 * 
 * 支持的选项：
 * salt - 手动提供哈希密码的盐值（salt）。这将避免自动生成盐值（salt）。
 * 省略此值后，password_hash() 会为每个密码哈希自动生成随机的盐值。这种操作是有意的模式。
 * Warning :盐值（salt）选项从 PHP 7.0.0 开始被废弃（deprecated）了。 现在最好选择简单的使用默认产生的盐值。
 * 
 * cost - 代表算法使用的 cost。crypt() 页面上有 cost 值的例子。
 * 省略时，默认值是 10。 这个 cost 是个不错的底线，但也许可以根据自己硬件的情况，加大这个值。
 * 
 * 参数 :
 * 1. password 用户的密码。
 * Caution :使用PASSWORD_BCRYPT 做算法，将使 password 参数最长为72个字符，超过会被截断。
 * 
 * 2. algo 一个用来在散列密码时指示算法的密码算法常量。
 * 
 * 3. options 一个包含有选项的关联数组。
 * 目前支持两个选项：salt，在散列密码时加的盐（干扰字符串），以及cost，用来指明算法递归的层数。
 * 这两个值的例子可在 crypt() 页面找到。省略后，将使用随机盐值与默认 cost。
 * 
 * 返回值: 
 * 返回哈希后的密码， 或者在失败时返回 FALSE。
 * 使用的算法、cost 和盐值作为哈希的一部分返回。所以验证哈希值的所有信息都已经包含在内。
 * 这使 password_verify() 函数验证的时候，不需要额外储存盐值或者算法的信息。
 *  
 * 注释:
 * Caution: 强烈建议不要自己为这个函数生成盐值（salt）。只要不设置，它会自动创建安全的盐值。
 * 就像以上提及的，在 PHP 7.0 提供 salt选项会导致废弃（deprecation）警告。 未来的 PHP 发行版里，手动提供盐值的功能可能会被删掉。
 * 
 * Note:
 * 在交互的系统上，推荐在自己的服务器上测试此函数，调整 cost 参数直至函数时间开销小于 100 毫秒（milliseconds）。
 * 上面脚本的例子会帮助选择合适硬件的最佳 cost。(10)
 * Note: 这个函数更新支持的算法时（或修改默认算法），必定会遵守以下规则：
 * 1. 任何内核中的新算法必须在经历一次 PHP 完整发行才能成为默认算法。 
 * 比如，在 PHP 7.5.5 中添加的新算法，在 PHP 7.7 之前不能成为默认算法 （由于 7.6 是第一个完整发行版）。
 * 但如果是在 7.6.0 里添加的不同算法，在 7.7.0 里也可以成为默认算法。
 * 
 * 2. 仅仅允许在完整发行版中修改默认算法（比如 7.3.0, 8.0.0，等等），不能是在修订版。
 * 唯一的例外是：在当前默认算法里发现了紧急的安全威胁。
 * 
 * 参见:
 * password_verify() - 验证密码是否和哈希匹配 (http://php.net/manual/zh/function.password-verify.php)
 * crypt() - 单向字符串散列 (http://php.net/manual/zh/function.crypt.php)
 * » 用户的使用 (https://github.com/ircmaxell/password_compat)
 */

// Example #1 password_hash() 例子
/**
 * 我们想要使用默认算法哈希密码
 * 当前是 BCRYPT，并会产生 60 个字符的结果。
 * 
 * 请注意，随时间推移，默认算法可能会有变化，
 * 所以需要储存的空间能够超过 60 字（255字不错）
 * 
 * echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";
 */
//以上例程的输出类似于：$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a

//Example #2 password_hash() 手动设置 cost 的例子
/**
 * 在这个案例里，我们为 BCRYPT 增加 cost 到 12。
 * 注意，我们已经切换到了，将始终产生 60 个字符。
 * 
 * $options = ['cost' => 12,];
 * echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options)."\n";
 * 
 */
//以上例程的输出类似于：$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K
?>

<?php
// Example #1 password_hash() 例子
/**
 * 我们想要使用默认算法哈希密码
 * 当前是 BCRYPT，并会产生 60 个字符的结果。
 *
 * 请注意，随时间推移，默认算法可能会有变化，
 * 所以需要储存的空间能够超过 60 字（255字不错）
 */
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";
?>

