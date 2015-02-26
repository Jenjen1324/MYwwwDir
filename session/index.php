<?php

session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Nimisha isch dumm</title>
    <link rel="stylesheet" type="text/css" href="/style/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Beispiel - Session</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <?php if(!isset($_SESSION['id'])) { ?>
        <li><a href="login.php">Login</a></li>
        <?php } else { ?>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="witze.php">Witze</a></li>
        <?php } ?>
      </ul>
      <?php
      if(isset($_GET['m'])) {
        echo "<p>$_GET[m]</p>";
      } ?>
      <p>
        Willkommen auf der Nimisha ist dumm Seite!
      </p>
    </div>
  </body>
</html>
