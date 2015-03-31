<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once("lib/picture.php");
require_once("lib/user.php");

$u = User::getCurrentUser();

if($u)
if($_GET['id'])
if($_GET['id'] != "")
{
  if($pic = Picture::getPictureById($_GET['id']))
  {
    $pic->downloads++;
    Picture::editPicture($pic);

    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"$pic->name." . $pic->getExt() . "\"");
    echo readfile(PATH_PFILES . $pic->filename);
  }
}



header("Location: " . $_SERVER['HTTP_REFERER']);
