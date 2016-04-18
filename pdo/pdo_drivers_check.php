<?php 
print_r(pdo_drivers());
// print_r(phpinfo());
if (function_exists('mysql_connect')) { 
    echo '<br/>Mysql扩展已经安装'; 
    var_dump(pdo_drivers()) ;  
}else{
    echo php.info();
}
?>