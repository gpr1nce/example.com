<?php
require '../../core/functions.php';
require '../../core/bootstrap.php';
require '../../core/db_connect.php';

checkSession();
//Build the page metadata
$meta = [];
$meta['description'] = "User Add gpr1nce github";
$meta['keywords'] = "user, add, gpr1nce";

$message=null;

$args = [
    'first_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'last_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'email'=>FILTER_SANITIZE_EMAIL, //strips HMTL
];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){

    //Strip white space, begining and end
    $input = array_map('trim', $input);

    //Sanitized insert
    $sql = 'INSERT INTO users SET id=uuid(), first_name=?, last_name=?, email=?';

    if($pdo->prepare($sql)->execute([
        $input['first_name'],
        $input['last_name'],
        $input['email']
    ])){
       header('LOCATION:/example.com/public/users');
    }else{
        $message = 'Something bad happened';
    }
}

$content = <<<EOT
<h1>Add a New User</h1>
{$message}
<form method="post">

<div class="form-group">
    <label for="first_name">First Name</label>
    <input id="first_name" name="first_name" type="text" class="form-control">
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <textarea id="last_name" name="last_name" type="text" class="form-control"></textarea>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <textarea id="email" name="email" type="email" class="form-control"></textarea>
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>
</form>
EOT;

include '../../core/layout.php';