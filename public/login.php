<?php
// 1. Require your session file, this contains session_start()
require '../core/session.php';


// 2. Listen for a POST request. On Post set a session. 
// In the next iteration we replace this with authentication logic.
$_POST['id']=12345;//Force a valid POST
if(!empty($_POST)){
    $_SESSION['user'] = [];
    $_SESSION['user']['id']=$_POST['id'];
    header('LOCATION: ' . $_GET['goto']);
}

// 3. Provide just enough of a form to initiate a POST
$content=<<<EOT
<form method="post">
    <input name="goto" value="{$_GET['goto']}">
    <input type="submit" class="btn btn-primary">
</form>
EOT;

require '../core/layout.php';
