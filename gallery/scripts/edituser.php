<?php
require_once("../lib/user.php");


try
{
  $u = User::getCurrentUser();
  if(!$u)
    throw new Exception("You are not logged in!");
  if(!$u->admin)
    throw new Exception("You need administrative rights to do this!");

  if(isset($_GET['uid']))
  if(isset($_GET['action']))
  {
    if($_GET['action'] == "del")
      User::deleteUser(User::getUserById($_GET['uid']));
    if($_GET['action'] == "admin")
    {
      $user = User::getUserById($_GET['uid']);
      $user->admin = !$user->admin;
      User::editUser($user);
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }
}
catch(Exception $ex)
{
  echo $ex->getMessage();
  die();
}

 ?>
