<?php

/**
 * Define image directory from which the
 * files will be loaded
 */
define('VIDEO_DIR', dirname(__FILE__) . '/uploads/');

/**
 * Fetch image and properties from the url
 */
$a = $_GET['a'];
if ($a === null) {
    return false;
}

$url = $a;

// Decode the url
//$url = decrypt($a);
//if ($url === false) {
//    return false;
//}

$data = [];
$tmp = explode('-', $url);
foreach ($tmp as $k => $v) {
    $keyValue = explode('=', $v);
    if (sizeof($keyValue) !== 2) {
        return false;
    }
    $data[$keyValue[0]] = $keyValue[1];
}

$video = (isset($data['video'])) ? $data['video'] : null;

if ($video === null || ! file_exists(VIDEO_DIR . $video)) {
    return false;
}

/**
 * Display the video
 */
header('Content-type: video/*');
readfile(VIDEO_DIR . $video);