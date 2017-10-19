<?php
include_once "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Images</title>
	<style type="text/css">
		#wrapper{
			margin:5% auto;
			width :50%;
		}
		button{
			background-color: red;
		}
		a{
			font-size: 15px;
			background-color: blue;
			padding: 5px;
			color: #fff;
			text-decoration: none;
		}
		#tabel{
			margin-top: 10px;
		}
	</style>
</head>
<body>

<div id="wrapper">
<FONT SIZE="6"> <p><CENTER><b>BARANG/ PRODUK YANG SUDAH BERHASIL DI UPLOAD KE SOSIAL MEDIA</B></CENTER></P> </FONT>
<a href="index.php">Input File</a>
<table id="tabel" border="1" cellspacing="0" cellpadding="5px">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Gambar</th>
		<th>Size</th>
		<th>Bahan</th>
		<th>Kategori</th>
		<th>Harga</th>
		<th>Tanggal Upload</th>
	</tr>
	<?php
	 $query = mysqli_query($con, "select * from upload_images");
	 if(mysqli_num_rows($query) > 0){
	 	
	 	$no = 1;
	 	while($r = mysqli_fetch_array($query)){
	 		$id = $r['id'];
	 		$nama = $r['nama'];
	 		$gambar = "images/thumb_".$r['images'];
			$size = $r['size'];
			$bahan = $r['bahan'];
			$kategori = $r['kategori'];
			$harga = $r['harga'];
	 		$tgl_upload = $r['tgl_upload'];
	 		echo "
	 			<tr>
	 			<td>$no</td>
	 			<td>$nama</td>
	 			<td><img title='$nama' src='$gambar' width='100px' height='125px' \></td>
				<td>$size</td>
				<td>$bahan</td>
				<td>$kategori</td>
				<td>$harga</td>
	 			<td>$tgl_upload</td>
	 			</tr>
	 		";
	 		$no++;
	 	}
	 }

	?>
</table>
</div>
</body>
</html>