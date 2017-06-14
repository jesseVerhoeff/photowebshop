<?php
/**
 * Load the bootstrapping file, this file
 * loads all the functions, helpers, and
 * defines the directories, and setups the
 * application.
 */


/**
 * Fetch image and properties from the url
 */
$a = $_GET['img'];
if ($a === null) {
	return false;
}

$url = $a;

$file = './uploads/' . $url;

if (! file_exists($file)) {

	echo 1;
	return false;
}

$path = pathinfo($file);
$mime = mime_content_type($file);

header('Content-type: ' . $mime);
header('Content-Disposition: attachment; filename=' . $path['filename'] . '.' . $path['extension']);
readfile($file);