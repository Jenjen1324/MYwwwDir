<?php

$wd = getcwd();
$path = $wd . "/testdir/";
$dh = opendir($path);

while(FALSE !== ($file = readdir($dh)))
{
  if(is_dir($path . $file))
  {
    echo $file."<br>";
  }
}

?>
