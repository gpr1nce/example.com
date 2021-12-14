<?php

$host = '127.0.0.1';
$db   = 'bootcamp';
$user = 'root';
$pass = 'password';
// tried changing above 12.12 to below - rejected with this err:
// $user = 'ten@ten.com';
// $pass = 'R00teee!';
/* err from ^ these 2 rows maybe not allowed? Will try with layout.php
     Fatal error: Uncaught PDOException: SQLSTATE[HY000] [1045] Access denied for user 'ten@ten.com'@'localhost' (using password: YES) in /var/www/example.com/core/db_connect.php:23 Stack trace: #0 /var/www/example.com/public/index.php(3): require() #1 {main} thrown in /var/www/example.com/core/db_connect.php on line 23
*/
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     // var_dump($pdo);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
// 12.12. failed attempt to show value below
// $pExcep = ('\PDOException $e');
// echo 'pdo exception:' + $pExcep;


};


