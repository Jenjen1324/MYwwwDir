<?php

DEFINE("USER", "admin");
DEFINE("PASS", "pizza");

session_start();

if(isset($_SESSION['id']))
{
  $_SESSION['id'] = null;
  session_destroy();
}

if(isset($_POST['username']) && isset($_POST['password']))
{
  if($_POST['username'] == USER && $_POST['password'] == PASS)
  {
    $_SESSION['id'] = 1;
    header("Location: index.php?m=Login%20Success");
    die();
  }
  else
  {
    header("Location: index.php?m=Login%20Unsuccesful");
    die();
  }
}

header("Location: index.php?m=Error");
