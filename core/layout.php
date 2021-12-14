<!-- Set session in php -->
<?php
function active($name){
  $current = $_SERVER['REQUEST_URI'];
  if($current === $name){
    return 'active';
    // here's where I want to pass admin?
    // get admin boolean if needed (not for login.php?)
    // echo $admin;
  } else {
      return null;
  }
}

//Any page that  works with session data MUST include session_start()
session_start();
 // same function as below?
  // checkSession();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Add sanitized content -->
  <?php if(!empty($meta)): ?>

    <?php if(!empty($meta['title'])): ?>
      <title><?php echo $meta['title']; ?></title>
    <?php endif; ?>

    <?php if(!empty($meta['description'])): ?>
      <meta name="description" content="<?php echo $meta['description']; ?>">
    <?php endif; ?>

    <?php if(!empty($meta['keywords'])): ?>
      <meta name="keywords" content="<?php echo $meta['keywords']; ?>">
      $message="<div class=\"alert alert-danger\">Welcome, regular user!</div>";
    <?php endif; ?>
<!-- not working 12.14 -->

<?php endif; ?>
<!-- End sanitized content

      <meta charset="UTF-8">

      <title>About George Prince</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="css/dist/main.css">
  </head>
  <body>
  <!-- stuff for passing Admin status from login -->
{admin}
    <div id="Wrapper">
        <nav class="top-nav">
            <a href="index.html" class="pull-left" href="/">Site Logo</a>
            <ul role="navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="resume.php">Resume</a></li>
                <li><a href="contact.php">Contact</a></li>
            <br>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
              </li>
            </ul>
        </nav>

        <div class="row">
            <div id="Content">
                <?php echo $content; ?>
            </div>
            <div id="Sidebar">
              <div id="AboutMe">
                <div class="header">Hello, I am George</div>
                <img src="https://www.gravatar.com/avatar/4678a33bf44c38e54a58745033b4d5c6?d=mm" alt="My Avatar" class="img-circle">
              </div>
            </div>
        </div>

        <div id="Footer" class="clearfix">
            <small>&copy; 2021 - Databarista LLC</small>
            <ul role="navigation">
                <li><a href="terms.html">Terms</a></li>
                <li><a href="privacy.html">Privacy</a></li>
            </ul>
        </div>
    </div>

  </body>

</html>

