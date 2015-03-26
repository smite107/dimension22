<?php

function crop_and_resize($im, $x1, $y1, $x2, $y2, $new_width, $new_height) {
  $im_w = abs($x1 - $x2);
  $im_h = abs($y1 - $y2);
  $new_img = imagecreatetruecolor($new_width, $new_height);
  imagecopyresampled($new_img, $im, 0, 0, $x1, $y1, $new_width, $new_height, $im_w, $im_h);
  return $new_img;
}

function resize_origin($im, $o_w, $o_h, $max_w, $max_h) {
  if ($o_w > $o_h && $o_w > $max_w) { //ширина больше
    $new_w = $max_w;
    $new_h = $o_h * ($max_w / $o_w);
  } else if ($o_h > $o_w && $o_h > $max_h) {
    $new_h = $max_h;
    $new_w = $o_w * ($max_h / $o_h);
  } else if ($o_w == $o_h && ($o_w > $max_w || $o_h > $max_h)) {
    $new_w = min($max_w, $max_h);
    $new_h = $new_w;
  }
  $new_img = imagecreatetruecolor($new_w, $new_h);
  imagecopyresampled($new_img, $im, 0, 0, 0, 0, $new_w, $new_h, $o_w, $o_h);
  return $new_img;
}

$uploaddir    = 'uploads/';
$image_name   = $_POST['fileName'];
$path         = $uploaddir . $image_name . '.jpg';
$im           = imagecreatefromjpeg($path);
$arr          = getimagesize($path);
$owner_width  = $arr[0];
$owner_height = $arr[1];
$width        = $_POST['width'];
$height       = $_POST['height'];

$x1 = $_POST['x1'];
$y1 = $_POST['y1'];
$x2 = $_POST['x2'];
$y2 = $_POST['y2'];

$p_sizes = explode(',', $_POST['sizes']);

foreach ($p_sizes as $size) {
  $sizes = explode('#', $size);
  $n_name = $sizes[0];
  $n_width = $sizes[1];
  $n_height = $sizes[2];
  $new_img = crop_and_resize($im, $x1, $y1, $x2, $y2, $n_width, $n_height);
  imagejpeg($new_img, $uploaddir . $image_name . '_' . $n_name . '.jpg');
}

$r_sizes = explode(',', $_POST['resizes']);

foreach ($r_sizes as $size) {
  $sizes = explode('#', $size);
  $n_name = $sizes[0];
  $max_w = $sizes[1];
  $max_h = $sizes[2];
  $new_img = resize_origin($im, $owner_width, $owner_height, $max_w, $max_h);
  imagejpeg($new_img, $uploaddir . $image_name . '_' . $n_name . '.jpg');
}

?>