<?php
/*
Author: Jens Vogler
Date: 15.12.2015
Use as: Reference (do not copy)
*/

// Define constants
$filename = "votes.txt";

$candidates = array (
  "Niko",
  "Nimisha",
  "Cliff",
  "Manuel"
)

?>

<!DOCTYPE html>
<html>

<head>
  <title>Vote</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Vote here</h1>
    <form method="post" action="addvote.php">
      <?php
      // Loop through candidates for radio buttons
      foreach($candidates as $c)
      {
        echo "<input type='radio' name='data' value='$c'>$c<br/>";
      }
      ?>
      <input type="submit">
    </form>

    <h1>Results</h1>
    <div class="well">
      <?php
      // Read result file
      if(file_exists($filename))
      {
        $text = file_get_contents($filename);
        $data = unserialize($text);
        $sum = array_sum($data);

        // Print the results with progress bars
        foreach($data as $k => $v)
        {
          echo "<p>$k ($v)<br/><progress value='$v' max='$sum'></progress>";
        }
      }

      ?>
    </div>
  </div>
</body>

</html>
