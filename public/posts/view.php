<?php
include '../../core/db_connect.php';


$input = filter_input_array(INPUT_GET);
$slug = preg_replace("/[^a-z0-9-]+/", "", $input['slug']);

$content=null;
$stmt = $pdo->prepare('SELECT * FROM posts WHERE slug = ?');
$stmt->execute([$slug]);

$row = $stmt->fetch();
$content .= "<h1>{$row['title']}</h1>";
$content .="<p><a href=\"delete.php?id={$row['id']}\">Delete</a><br>";
$content .="<p><a href=\"edit.php?id={$row['id']}\">Edit Post</a><br>";


echo $content;
