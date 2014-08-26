<?php

require_once('theme/common.template.php');

/*
	replace array indexes:
	1) fix windows slashes
	2) strip up-tree ../ as possible hack attempts
*/
$URL = str_replace(
	array( '\\', '../' ),
	array( '/',  '' ),
	$_SERVER['REQUEST_URI']
);

if ($offset = strpos($URL,'?')) {
	// strip getData
	$URL = substr($URL,0,$offset);
} else if ($offset = strpos($URL,'#')) {
	/*
		Since hashes are after getData, you only need
		to strip hashes when there is no getData
	*/
	$URL = substr($URL,0,$offset);
}

/*
	the path routes below aren't just handy for stripping out
	the REQUEST_URI and looking to see if this is an attempt at
	direct file access, they're also useful for moving uploads,
	creating absolute URI's if needed, etc, etc
*/
$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));

// strip off the URL root from REQUEST_URI
if (URL_ROOT != '/') $URL=substr($URL,strlen(URL_ROOT));

// strip off excess slashes
$URL = trim($URL,'/');

// 404 if trying to call a real file
if (
	file_exists(DOC_ROOT.'/'.$URL) &&
	($_SERVER['SCRIPT_FILENAME'] != DOC_ROOT.$URL) &&
 	($URL != '') &&
 	($URL != 'index.php')
) die404();

/*
	If $url is empty of default value, set action to 'default'
	otherwise, explode $URL into an array
*/
$ACTION = (
	($URL == '') ||
	($URL == 'index.php') ||
	($URL == 'index.html')
) ? array('default') : explode('/',html_entity_decode($URL));

/*
	I strip out non word characters from $ACTION[0] as the include
	which makes sure no other oddball attempts at directory
	manipulation can be done. This means your include's basename
	can only contain a..z, A..Z, 0..9 and underscore!
	
	for example, as root this would make:
	pages/default.php
*/
$includeFile = 'pages/'.preg_replace('/[^\w]/','',$ACTION[0]).'.php';

if (is_file($includeFile)) {

	include($includeFile);
	
} else die404();

?>