<?php
require '../core/bootstrap.php';
// 1. Connect to the database
require '../core/db_connect.php';

// 12.12: will this enable use of session superglob?
require '../core/session.php';

//Any page that  works with session data MUST include session_start()
session_start();

// 2. Filter the user inputs
$input = filter_input_array(INPUT_POST,[
    'email'=>FILTER_SANITIZE_EMAIL,
    'password'=>FILTER_UNSAFE_RAW
]);

// 3. Check for a POST request
if(!empty($input)){

    // 4. Query the database for the requested user
    $input = array_map('trim', $input);
    $sql='SELECT id, hash, role, expires FROM users WHERE email=:email';
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'email'=>$input['email']
    ]);
    $row=$stmt->fetch();

    if($row){
// we will need this outside of login.php; tried Global scoping but abandoned after a few attempts 
        $isAdmin = false;

        // 5. Attempt a password match
        $match = password_verify($input['password'], $row['hash']);
        if($match){
            // 6.1 Set a session
            $_SESSION['user'] = [];
            $_SESSION['user']['id']=$row['id'];
// are you an admin?
            if($row['role'] == 'Admin') {
                $isAdmin = true;
// capture $isAdmin at session level; pass as boolean?
                $_SESSION['admin'] = [];
                $_SESSION['admin']['$isAdmin']=$row['id'];

                $message="<div class=\"alert alert-danger\">You are an Admin!</div>";
            }
            else {
                $message="<div class=\"alert alert-danger\">Welcome, regular user!</div>";
            }
            // 6.2 Redirect the user. WAS
            // header('LOCATION:index.php');
// 12.12: from web: To pass info via GET:
//sample    header('Location: otherScript.php?var1=val1&var2=val2');
            // header('LOCATION:index.php?admin=' + $isAdmin)');
// or this?
header('LOCATION:index.php?admin=$' . $_GET['admin']);

 /* for testing, to stay on page header('LOCATION:login.php');*/
        }
// user auth failed
        else {
            $message="<div class=\"alert alert-danger\">User authentication failed!</div>";
        }
    }
}
$meta=[];
$meta['title']="Login";

$content=<<<EOT
<h1>{$meta['title']}</h1>
<form method="post" autocomplete="off">
    <div class="form-group">
        <label for="email">Email</label>
        <input 
            class="form-control"
            id="email"
            name="email"
            type="email"
        >
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input 
            class="form-control" 
            id="password" 
            name="password" 
            type="password"
        >
    </div>
    {$message}
// v this line causes error as of 12.12.21
    <input name="goto" value="{$goto}" type="hidden">
    <input type="submit" class="btn btn-primary">
</form>
EOT;

require '../core/layout.php';
