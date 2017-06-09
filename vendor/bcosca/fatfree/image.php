<?php

/**
 * Define image directory from which the
 * files will be loaded
 */
define('IMG_DIR', dirname(__FILE__) . '/uploads/');

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

$image = (isset($data['img'])) ? $data['img'] : null;
$imageWidth = (isset($data['w'])) ? $data['w'] : null;
$imageHeight = (isset($data['h'])) ? $data['h'] : null;

if ($image === null || ! file_exists(IMG_DIR . $image)) {
    return false;
}
$image = imagecreatefromstring(file_get_contents(IMG_DIR . $image));

/**
 * Resize base image
 */
list($width, $height) = getimagesize(IMG_DIR . $data['img']);

// Find out aspect ratio, height and width
if ($imageHeight === null) {
    $ratio = $width / $height;
    $newWidth = $imageWidth;
    $newHeight = $newWidth / $ratio;
} elseif ($imageWidth === null) {
    $ratio = $width / $height;
    $newHeight = $imageHeight;
    $newWidth = $newHeight * $ratio;
} else {
    $newHeight = $imageHeight;
    $newWidth = $imageWidth;
}

// Only resize the image if not height and width are null
if ($imageHeight !== null || $imageWidth !== null) {
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    $image = $newImage;
}

/**
 * Watermark the image
 */

$watermark = (isset($data['w_img'])) ? $data['w_img'] : null;
$watermarkWidth = (isset($data['w_w'])) ? $data['w_w'] : null;
$watermarkHeight = (isset($data['w_h'])) ? $data['w_h'] : null;

if ($watermark !== null && file_exists(IMG_DIR . $watermark)) {
    if ($watermarkWidth === null) {
        $watermarkWidth = 100;
    }
    if ($watermarkHeight === null) {
        $watermarkHeight = 100;
    }

    $watermark = imagecreatefromstring(file_get_contents(IMG_DIR . $watermark));

    $newWatermark = imagecreatetruecolor($watermarkWidth,$watermarkHeight);
    imagealphablending($newWatermark, false);
    imagesavealpha($newWatermark, true);
    imagecopyresampled($newWatermark, $watermark, 0, 0, 0, 0, $watermarkWidth, $watermarkHeight, imagesx($watermark),imagesy($watermark));

    $margin = [
        'right' => 20,
        'bottom' => 20
    ];
    imagecopy($image, $newWatermark,
        imagesx($image) - imagesx($newWatermark) - $margin['right'],
        imagesy($image) - imagesy($newWatermark) - $margin['bottom'],
        0, 0, imagesx($newWatermark), imagesy($newWatermark));
}

/**
 * Display the image
 */
header('Content-type: image/png');
imagepng($image);

/**
 * Destroy the images to clear memory
 */
imageDestroy($image);
if ($watermark !== null) {
    imageDestroy($watermark);
}