<?php

function my_header($title)
{
	echo <<<HEADER
<?xml version="1.0" encoding="ISO-8859-1" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de"
xml:lang="de">
<head>
<title>$title</title>
</head>
<body>
HEADER;
}

function my_footer()
{
	echo <<<FOOTER
</body>
</html>
FOOTER;
}

function farbe($text, $farbe)
{
	bunt($text, $farbe, "#FFF");
}

function bunt($text, $farbe, $hintergrund)
{
	echo "<span style='color: $farbe; background-color: $hintergrund; text-decoration: underline;'>$text</span>";
}

function tannenbaum($height)
{
	echo '<pre style="text-align: center;">';

	for ($i = 0; $i < $height; $i++)
	{
		for($j = 0; $j < $i; $j++)
			echo '*';
		echo "\n";
	}

	echo '|</pre>';
}