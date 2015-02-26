<?php
/*
Author: Jens Vogler
Date: 15.12.2015
Use as: Reference (do not copy)
*/

// Define constants
$filename = "votes.txt";

// Check if data is present
if(isset($_POST['data']))
{
  $data = array();
  // Read data file
  if(file_exists($filename))
  {
    $text = file_get_contents($filename);
    $data = unserialize($text);
  }

  // Add array key if needed
  if(!array_key_exists($_POST['data'], $data))
    $data[$_POST['data']] = 0;

  // Increment counter
  $data[$_POST['data']]++;

  // Write new data to file
  $newtext = serialize($data);
  file_put_contents($filename, $newtext);
}

// Redirect to previous page
header("Location: " . $_SERVER['HTTP_REFERER']);
