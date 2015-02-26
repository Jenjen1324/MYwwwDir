<?php

error_reporting(E_ALL);

require_once("lib.php");

my_header("Titel");

echo "<p>Hallo sch&ouml;ne Welt.</p>\n";
echo '<br>';

farbe("Heyooo", "#AA3939");
echo '<br>';

bunt("Lalalaa", "#550000", "#FFAAAA");
echo '<br>';

tannenbaum(10);
echo '<br>';

my_footer();

?>