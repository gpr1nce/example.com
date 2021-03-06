<!DOCTYPE html>
<html lang="en">
    <head>
       <title>In GIT I am gpr1nce</title>
       <meta charset="UTF-8">
       <meta name="description" content="George Prince Web Developer">
       <meta name="keywords" content="Git, GitHub, George Prince, George, Prince, gpr1nce">

       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
       <link rel="stylesheet" type="text/css" href="./dist/css/main.min.css">
       <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
       <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
       <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
       <link rel="manifest" href="/site.webmanifest">
              <link rel="icon" href="favicon.ico" type="image/x-icon" />
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <!-- /* load fonts  */ -->
    <style>
        <!-- /* open sans import */ -->
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
        /* <!-- ubuntu for restyled headings --> */
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
        </style>
    </head>
    <body>
      <header>
        <span class="logo">gpr1nce</span>
        <a id="toggleMenu">Menu<a>
        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="resume.html">Resume</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </nav>
      </header>
          <main>
            <section class="hdr">
              <h1>Hello World, my GitHub name is gpr1nce.</h1>
              </section>
          <h2>Don't understand GIT?</h2>
          <section class="slugline">
            <h3>Hang in there until the light dawns</h3>
            </section>
<section>
  <img class="avatar" src="croptIKBsquared2.jpg" alt="gpr1nce">
  <!-- <img class="avatar" src="https://www.gravatar.com/avatar/4678a33bf44c38e54a58745033b4d5c6?d=mm&s=64" alt="gpr1nce"> -->
  

        <p class="hdr">I am neither a new nor a very Experienced web developer. Currently in MicroTrain's Full Stack / Hybrid Mobile App Dev bootcamp, I've been astonished at how powerful client side tools have become. In the 20+ years since I first studied HTML the language and its supporting structures in CSS and Javascript are both easier to work with and greatly more sophisticated.</p>
        <br>
</section>
        <h2>HTML Global Attributes</h2>
        <p>Attributes bring your markup to life. Attributes allow for programming...</p>
        <h3>Event Handler Attributes</h3>
        <p>Event Handler Attributes (UI Events) allow a user to interact...</p>
        <p>Here a list of...</p>
        <ul>
            <li>Item one</li>
            <li>Item two</li>
            <li>Item three</li>
        </ul>
        <h2>Summary</h2>
        <p>In summation...</p>
      </main>
      <script>

        var toggleMenu = document.getElementById('toggleMenu');
        var nav = document.querySelector('nav');
        toggleMenu.addEventListener(
          'click',
          function(){
            if(nav.style.display=='block'){
              nav.style.display='none';
            }else{
              nav.style.display='block';
            }
          }
        );
      </script>
  
    </body>
</html>
