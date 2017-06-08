<?php
function imagecreatefromfile($image_path) {
	list($width, $height, $image_type) = getimagesize($image_path);

	switch ($image_type)
	{
		case IMAGETYPE_GIF: return imagecreatefromgif($image_path); break;
		case IMAGETYPE_JPEG: return imagecreatefromjpeg($image_path); break;
		case IMAGETYPE_PNG: return imagecreatefrompng($image_path); break;
		default: return ''; break;
	}
}

$image = imagecreatefromfile($_GET['image']);
if (!$image) die('afbeelding is niet');

$watermerk = imagecreatefromfile($_GET['watermerk']);
if (!$image) die('Merk doet het niet');


$watermerk_pos_x = imagesx($image) - imagesx($watermerk) - 8;
$watermerk_pos_y = imagesy($image) - imagesy($watermerk) - 10;

imagecopy($image, $watermerk,  $watermerk_pos_x, $watermerk_pos_y, 0, 0,
	imagesx($watermerk), imagesy($watermerk));

header('Content-Type: image/jpeg');
imagejpeg($image, NULL, 100);

imagedestroy($image);
imagedestroy($watermerk);