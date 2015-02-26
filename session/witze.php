<?php

session_start();
if(!isset($_SESSION['id']))
{
  header("Location: index.php?m=No%20Access");
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="/style/bootstrap.min.css">
  <title>Witze</title>
</head>
<body>
  <div class="container">
    <h1>Witze</h1>
    <ul>
      <li><a href="index.php">Home</a></li>
    </ul>
    <p>
      <?php
      for($i = 0; $i < 100; $i++)
        echo "Nimisha ist dumm<br>";
      ?>
    </p>
  </div>
</body>
</html>
