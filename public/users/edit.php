<?php
require '../../core/functions.php';
require '../../config/keys.php';
require '../../core/db_connect.php';
//Build the page metadata
$meta = [];
$meta['description'] = "User Edit MicroTrain2111";
$meta['keywords'] = "user, edit, MicroTrain2111";

// Get the user 
$get = filter_input_array(INPUT_GET);
$id = $get['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->execute(['id'=>$id]);

$row = $stmt->fetch();

//If the id cannot be found kill the request
if(empty($row)){
  http_response_code(404);
  die('Page Not Found <a href="/">Home</a>');
}

//var_dump($row);
$meta=[];
$meta['title']= "Edit: {$row['first_name']} {$row['last_name']}";

// Update the user
$message=null;

$args = [
    'id'=>FILTER_SANITIZE_STRING, //strips HMTL
    'first_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'last_name'=>FILTER_SANITIZE_STRING, //strips HMTL
    'email'=>FILTER_SANITIZE_EMAIL, //strips HMTL
];

$input = filter_input_array(INPUT_POST, $args);

if(!empty($input)){

    //Strip white space, begining and end
    $input = array_map('trim', $input);

    //Create the id
    // $id = id($input['first_name']);

    //Sanitized insert
    $sql = 'UPDATE
        users
      SET
        first_name=:first_name,
        last_name=:last_name,
        email=:email
      WHERE
        id=:id';

    if($pdo->prepare($sql)->execute([
        // 'id'=>$id,
        'first_name'=>$input['first_name'],
        'last_name'=>$input['last_name'],
        'email'=>$input['email'],
        'id'=>$input['id']
    ])){
       header('LOCATION:./view.php?id=' . $row['id']);
    }else{
        $message = 'Something bad happened';
    }
}

$content = <<<EOT
<h1>Edit: {$row['first_name']}  {$row['last_name']}</h1>
{$message}
<form method="post">

<input id="id" name="id" value="{$row['id']}" type="hidden">

<div class="form-group">
    <label for="first_name">First Name</label>
    <input id="first_name" value="{$row['first_name']}" name="first_name" type="text" class="form-control">
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="last_name">Last Name</label>
        <textarea id="last_name" name="last_name" rows="2"
          class="form-control"
          >{$row['last_name']}</textarea>
    </div>

    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <textarea id="email" name="email" rows="2"
          class="form-control"
          >{$row['email']}</textarea>
    </div>
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>
</form>
<br><hr><br>
EOT;

include '../../core/layout.php';