#!/usr/bin/env php
<?php
// option.php for option in /home/steve/Jour02/theval_s/option
//
// Made by THEVAL Steve
// Login   <theval_s@etna-alternance.net>
//
// Started on  Mon Oct 11 14:30:50 2016 THEVAL Steve
// Last update Mon Oct 11 15:28:26 2016 THEVAL Steve
//

$i = 1;
$j = 1;
$nbopt = 0;
$title = "Options: ";
$options = "";

if (isset($argv[1]))
{
	while (isset($argv[$i]))
	{
		if (isset($argv[$i][0]) && $argv[$i][0] == "-" && isset($argv[$i][1]))
		{
			$j = 1;
			if ($argv[$i][1] == "-") break;
			while (isset($argv[$i][$j]))
			{
				if (haveopt($options, $argv[$i][$j]) == false)
				{
					$nbopt += 1;
					$options .= $argv[$i][$j];
				}
				$j += 1;
			}
		}
		$i += 1;
	}
	if ($options == "") echo "No options";
	else
	{
		sortoptions($options, $nbopt);
		echo $title . $options;
	}
}
else echo "No options";

function haveopt($options, $opt)
{
	$n = 0;

	if ((ord($opt) < 65 || ord($opt) > 90)
		&& (ord($opt) < 97 || ord($opt) > 122))
		return (true);
	while (isset($options[$n]))
	{
		if (ord($options[$n]) == ord($opt))
			return (true);
		$n += 1;
	}
	return (false);
}

function sortoptions(&$options, $nbopt)
{
	$t = 0;
	$n = 0;
	$tmp = 'a';

	while ($t < $nbopt)
	{
		$n = 0;
		while ($n < $nbopt)
		{
			if (isset($options[$n]) && isset($options[$n + 1]))
			{
				if (ord($options[$n]) > ord($options[$n + 1]))
				{
					$tmp = $options[$n + 1];
					$options[$n + 1] = $options[$n];
					$options[$n] = $tmp;
				}
			}
			$n +=1;
		}
		$t += 1;
	}
}