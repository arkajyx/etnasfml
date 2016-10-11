#!/usr/bin/env php
<?php
// content.php for content in /home/steve/Jour02/theval_s/content
//
// Made by THEVAL Steve
// Login   <theval_s@etna-alternance.net>
//
// Started on  Mon Oct 11 11:05:21 2016 THEVAL Steve
// Last update Mon Oct 11 12:42:30 2016 THEVAL Steve
//

$i = 1;

while (isset($argv[$i]))
{
	if(file_exists($argv[$i]) == false)
		echo "content.php: {$argv[$i]}: No such file or directory\n";
	else if(is_dir($argv[$i]))
		echo "content.php: {$argv[$i]}: Is a directory\n";
	else if(is_readable($argv[$i]) == false || is_writable($argv[$i]) == false)
		echo "content.php: {$argv[$i]}: Permission denied\n";
	else
	{
		$content = "";
		$open = fopen("{$argv[$i]}", "r");
		$content .= fread($open, filesize($argv[$i])) . "\n";
		fclose($open);
		if ($content != "")
			echo $content;
	}
	$i += 1;
}
