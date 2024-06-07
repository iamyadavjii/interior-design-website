<?php
session_start();

header("Content-type: image/png");

// Create a blank image and add some text
$im = imagecreatetruecolor(200, 50);

// Set the background color
$white = imagecolorallocate($im, 255, 255, 255);
imagefilledrectangle($im, 0, 0, 200, 50, $white);

// Generate a random number and convert it to a string
$random_number = rand(1000, 9999);
$_SESSION["captcha"] = (string)$random_number;

// Allocate a random color for the text
$color = imagecolorallocate($im, rand(0, 255), rand(0, 255), rand(0, 255));

// Write the random number to the image
imagestring($im, 5, 75, 20, $random_number, $color);

// Output the image
imagepng($im);

// Clean up
imagedestroy($im);
?>