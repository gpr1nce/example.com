<?php
include '../../core/db_connect.php';
require '../../core/session.php';
checkSession();

$content=null;
$stmt = $pdo->query("SELECT * FROM posts");

while ($row = $stmt->fetch())
{

    $content .= "<a href=\"view.php?slug={$row['slug']}\">{$row['title']}</a>";
}

$content .="<p><a href=\"add.php\">New Post</a><br>";

include '../../core/layout.php';
