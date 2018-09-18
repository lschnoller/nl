<?php
header ("Content-type: image/jpeg");
$img = $_GET['img'];
$percent = '';
$constrain = '';
$min_area = 70000;
$x = @getimagesize($img);
$sw = $x[0];
$sh = $x[1];
if($sw > $sh)
{
	$w = 350;
	$temp = 350 * 100 / $sw;
	$h = round($temp * $sh / 100);
	
	$current_area = ($w * $h); 
	if($current_area < $min_area)
	{
		$plus_percentage = $min_area / $current_area;
		$w = round($w * $plus_percentage);
		$h = round($h * $plus_percentage);	
		//make sure that the wide side does not go over the limit
		if($w > 500) 
		{
			$w = 500;
			$temp = 500 * 100 / $sw;
			$h = round($temp * $sh / 100);
		}
	}
}
else
{
	$h = 350;
	$temp = 350 * 100 / $sh;
	$w = round($temp * $sw / 100);
	$current_area = ($w * $h); 
	if($current_area < $min_area)
	{
		$plus_percentage = $min_area / $current_area;
		$w = round($w * $plus_percentage);
		$h = round($h * $plus_percentage);	
	}
}
$im = @ImageCreateFromJPEG ($img) or
$im = @ImageCreateFromPNG ($img) or 
$im = @ImageCreateFromGIF ($img) or 
$im = false; 

if (!$im) {
	readfile ($img);
} else {
	$thumb = @ImageCreateTrueColor ($w, $h);
	@ImageCopyResampled ($thumb, $im, 0,0,0,0, $w, $h, $sw, $sh);
	@ImagePNG ($thumb);
}
?>