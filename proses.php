<?php
// include koneksi
include_once "config.php";
include_once "thumbnail.php";

// pendeklarasian variabel
$nama = $_POST['nama'];
$size = $_POST['size'];
$bahan = $_POST['bahan'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$filename = $_FILES['image']['name'];
$upload = $_POST['upload'];
$tgl_upload = date("Ymd");

// logika jika tombol upload diklik
if(isset($upload)){

	if(empty($nama and $size and $bahan and $kategori and $harga)){
		echo "<script>alert('Form tidak boleh ada yang kosong!!!'); window.location=('index.php');</script>";
	}else{

		$extension = getExtension($filename);
		$extension = strtolower($extension);
		if(($extension != "jpg")&& ($extension != "jpeg") && ($extension != "png")){

			echo "<script>window.alert('Maaf! Hanya mendukung JPG, JPEG, PNG'); window.location=('index.php');</script>";
		}else{

			$sizekb = filesize($_FILES['image']['tmp_name']);
			if($sizekb > MAX_SIZE*1024){

				echo "<script>window.alert('maaf! file terlalu besar'); window.location=(index.php);</script>";
			}else{

				$image_name = time().'.'.$extension;
				$ins = mysqli_query($con, "Insert INTO upload_images (nama, images, size, bahan, kategori, harga, tgl_upload) values ('$nama', '$image_name', '$size', '$bahan', '$kategori', '$harga', '$tgl_upload')");

				$new_name = "images/".$image_name;
				$copied = copy($_FILES['image']['tmp_name'], $new_name);
				$thumb_name = 'images/thumb_'.$image_name;
				$thumb = thumb($new_name,$thumb_name,WIDTH,HEIGHT);
				echo "<script>window.alert('berhasil di upload'); window.location=('view.php');</script>";
			}
		}
	}
}
?>
