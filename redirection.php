#!/usr/bin/env php
<?php
// redirection.php for redirection in /home/steve/Jour02/theval_s/redirection
//
// Made by THEVAL Steve
// Login   <theval_s@etna-alternance.net>
//
// Started on  Mon Oct 11 12:44:30 2016 THEVAL Steve
// Last update Mon Oct 11 13:28:50 2016 THEVAL Steve
//

if (isset($argv[1]) && isset($argv[2]) && isset($argv[3]))
{
	if(is_dir($argv[3]))
		echo "redirection.php: {$argv[3]}: Is a directory\n";
	else if((is_readable($argv[3]) == false
		|| is_writable($argv[3]) == false)
		&& file_exists($argv[3]) == true
		)
		echo "redirection.php: {$argv[3]}: Permission denied\n";
	else
	{
		$argv[1] = $argv[1] . "\n";
		if ($argv[2] == '>')
		{
			if ($open = fopen("{$argv[3]}", "w"))
			{
				if (fwrite($open, $argv[1]))
					fclose($open);
				else
					echo "redirection.php: {$argv[3]}: Cannot write in file\n";
			}
			else
				echo "redirection.php: {$argv[3]}: Cannot open file\n";
		}
		else if ($argv[2] == '>>')
		{
			if ($open = fopen("{$argv[3]}", "a"))
			{
				if (fwrite($open, $argv[1]))
					fclose($open);
				else
					echo "redirection.php: {$argv[3]}: Cannot write in file\n";
			}
			else
				echo "redirection.php: {$argv[3]}: Cannot open file\n";
		}
		else
		{
			echo "Usage : ./redirection.php 'string' '[> >>]' 'File'\n";
		}
	}
}
else
{
	echo "Usage : ./redirection.php 'string' '[> >>]' 'File'\n";
}
