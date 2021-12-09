<?php
require '../core/bootstrap.php';
require '../core/db_connect.php';

$meta=[];
$meta['description'] = "MicroTrain2111 Site For Web Development West Loop";
$meta['title']="MicroTrain, Site, Web Development, West Loop";

$content="<h1>MicroTrains Users</h1>";
$stmt = $pdo->query('SELECT * FROM users');

while($row = $stmt->fetch()){
  $content .= "<div><a href=\"view.php?id={$row['id']}\">{$row['first_name']} {$row['last_name']}</a></div>";
}

$content .= "<br><hr><div><a href=\"users\index.php\">Users</a></div><br>";
$content .= "<br><hr><div><a href=\"posts\index.php\">Posts</a></div><br>";

require '../core/layout.php';