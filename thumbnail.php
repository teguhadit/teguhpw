<?php
// membuat ukuran file upload dengan fungsi define
define("MAX_SIZE", 800);

// membuat ukuran width dan height menjadi 200
define("HEIGHT", 200);
define("WIDTH", 200);

// membuat function thumbnail image
function thumb($img_name, $filename, $new_w, $new_h){
	$ext = getExtension($img_name);
	if(!strcmp("jpg",$ext) or !strcmp("jpeg",$ext)){
		$src_img = imagecreatefromjpeg($img_name);
	}
	if (!strcmp("png",$ext)) {
		$src_img = imagecreatefrompng($img_name);
	}

	//membuat dimensi dari image
	$src_w = imagesx($src_img);
	$src_h = imagesy($src_img);

	//membuat dimensi untuk thumbnail image
	$ratio1 = $src_w/$new_w;
	$ratio2 = $src_h/$new_h;
	if ($ratio1 > $ratio2) {
		$dst_w = $new_w;
		$dst_h = $src_w/$ratio1;
	}else{
		$dst_h = $new_h;
		$dst_w = $src_h/$ratio2;
	}

	// menbuat image dengan dimensi baru
	$dst_img = imagecreatetruecolor($dst_w,$dst_h);
	imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);

	if(!strcmp("png",$filename))
		imagepng($dst_img, $filename);
	else
		imagejpeg($dst_img, $filename);

	imagedestroy($dst_img);
	imagedestroy($src_img);
}

function getExtension($str){
	$i = strrpos($str, ".");
	if(!$i){
		return "";
	}
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1, $l);
	return $ext;
}

?>