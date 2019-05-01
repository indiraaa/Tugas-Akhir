<?php
	session_start();
	$koneksi = mysqli_connect("localhost","root","","shop");

	if (isset($_POST['nama'])) {
		// is set?
		$id_pembeli = rand(1,1000);
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$alamat = $_POST['alamat'];
		$kontak = $_POST['kontak'];
		// tampung data file
		if (isset($_FILES["image"])) {
			$path = pathinfo($_FILES["image"]["name"]);
			$ekstensi = $path["extension"];
			$filename = $id_pembeli."-".rand(1,1000).".".$ekstensi;
			$sql = "insert into pembeli values ('$id_pembeli', '$nama', '$username', '$password', '$alamat', '$kontak', '$filename')";
			if (mysqli_query($koneksi,$sql)) {
				// jika berhasil
				move_uploaded_file($_FILES["image"]["tmp_name"], "img_pembeli/".$filename);
				// pesan sukses
				$_SESSION["message"] = array(
					"type" => "success",
					"message" => "Register berhasil"
				);
			}else{
				// jika gagal
				$_SESSION["message"] = array(
					"type" => "danger",
					"message" => "Register gagal"
				);
			}
			header("location:login_pembeli.php");
		}
	}
 ?>
