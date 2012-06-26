<?php
// e-Tutor is licensed under the GPL. Please see the LICENSE file for more
// information.

/*
plugins.php

written October 12th, 2002 by Pat

Function:

	Contains the common Plugin architecture
	
	
	NOTE: THIS PART IS NOT FINISHED
*/

require_once('include.php');

global $plugins, $pluginlist;

$pluginlist = getPlugins();
$plugins = array();

foreach ($pluginlist as $plugin) {
	$plugins[$plugin] = getInfo($plugin);
}

// Plugin Info can now be accessed as $plugins['nameofplugin']->info
$path = $HTTP_SERVER_VARS["PATH_INFO"];
if ($path) {
	$path = preg_replace('/^\//', '', $path);
	doPlugIn($path);
}

// This function is where main execution will happen
function doPlugIn($filename) {
	global $plugins;
	
	doc_start();
	print "You have selected the '" . $plugins[$filename]->fullname ."' PlugIn.";
	doc_end();
}

function printPlugInIcons($account) {
	global $plugins, $pluginlist;

	$number = countPlugIns($account);
	if ($number == 0) return;
	
	if ($number >= 3) $twidth = 100;
	else $twidth = ($number % 3) * 33;
	
	box_start("Extra Tools", 600);
	print "<TABLE WIDTH=$twidth%>\n";
	foreach ($pluginlist as $plugin) {
		if (in_array($account, $plugins[$plugin]->accounts) || $account == '') {
			// They're meant to see the icon
			$counter++;
			if (($counter % 3) - 1 == 0) print '<TR>';
			print "<TD ALIGN=CENTER><A HREF='plugins.php/" . $plugins[$plugin]->filestripped . "'><IMG SRC='plugins/" . $plugins[$plugin]->filestripped . ".png' WIDTH=48 HEIGHT=48 BORDER=0><BR>" . $plugins[$plugin]->fullname . "</A></TD>\n";
			if (($counter % 3) == 0) print '</TR><TR><TD colspan=3>&nbsp;<BR>&nbsp;<BR></TD></TR>';
		}
	}
	
	if (($counter % 3 != 0) && $number > 3) {
		for ($i=0; $i<=$counter%3; $i++) {
			print "<TD></TD>\n";
		}
		
		print "</TR>\n";
	}
	elseif ($number < 3) {
		print "</TR>\n";
	}
	
	print "</TABLE>\n";
	box_end();
	print '<P>';
}

function countPlugIns($account) {
	global $plugins, $pluginlist;
	
	foreach ($pluginlist as $plugin) {
		if (in_array($account, $plugins[$plugin]->accounts) || $account == '') {
			$counter++;
		}
	}
	
	return $counter;
}

function getPlugins() {
	$pluglist = array();
	
	if ($dir = @opendir("./plugins")) {
		while (($file = readdir($dir)) !== false) {
			if ($file != '.' && $file != '..' && ereg("\.php$", $file)) {
				array_push($pluglist, preg_replace("/.php$/", '', $file));
			}
		}  
		closedir($dir);
	}
	
	sort($pluglist);
	return $pluglist;
}

function getInfo($filename) {
	require dirname(__FILE__) . "/plugins/$filename.php";
	eval("\$x = new $filename();");
	$x->filestripped = $filename;
	
	return $x;
}

?>

