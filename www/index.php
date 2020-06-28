<?php
error_reporting(-1);
ini_set('display_errors', 1);
//mysql的容器名称
$host = 'mysql';
$user = 'root';
$pass = '123456';
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    echo "连接接mysqli数据库失败: " . mysqli_connect_error() . PHP_EOL;
    die;
}
echo "连接mysqli数据库成功" . PHP_EOL;
try {
    $conn = new PDO("mysql:host=$host;", $user, $pass);
    echo "连接PDO成功" . PHP_EOL;

} catch (PDOException $e) {
 
    echo $e->getMessage() . PHP_EOL;
    die;
}
//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect("redis", 6379);
echo "连接redis数据库成功";
//redis密码
$redis->auth("123456");
//查看服务是否运行
echo "Server is running: " . $redis->ping();
echo phpinfo();
