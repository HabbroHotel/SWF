<?php

$width = 100;
$height = 114;
$pixels = file_get_contents('supersecret.txt');

function buildimg($bytes, $width, $height)
{
	$img=imagecreatetruecolor($width, $height);
	imagealphablending($img, false);
	imagesavealpha($img, true);$x=0;$y=0;
	$colors=unpack("N*", $bytes);
	foreach($colors as $color)
	{
		imagesetpixel($img, $x, $y, (0x7f-($color>>25)<<24)|($color&0xffffff));
		if(++$x==$width)
		{$x=0;$y++;}
	}
	header('Content-Type: image/png');
	imagepng($img);
}

buildimg($pixels, $width, $height);

?>
