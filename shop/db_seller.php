<?php
	session_start();
	$koneksi = mysqli_connect("localhost","root","","shop");

	if (isset($_POST["action"])) {
		$id_seller = $_POST["id_seller"];
		$nama = $_POST["nama"];
		$user = $_POST["username"];
		$pass = md5($_POST["password"]);
		$kontak = $_POST["kontak"];

		if ($_POST["action"] == "insert") {
			//membuat query
			$sql = "insert into seller values ('$id_seller', '$nama', '$user', '$pass', '$kontak')";
			if (mysqli_query($koneksi,$sql)) {
				// jika berhasil
				// pesan sukses
				$_SESSION["message"] = array(
					"type" => "success",
					"message" => "Insert data berhasil"
				);
			}else{
				// jika gagal
				$_SESSION["message"] = array(
					"type" => "danger",
					"message" => mysqli_error($koneksi)
				);
			}
			header("location:page_admin.php?page=seller");
		}elseif ($_POST["action"] == "update") {
				// jika gambar tidak diedit
				$sql = "update seller set nama_seller='$nama', username='$user', password='$pass', kontak='$kontak' where id_seller='$id_seller'";
				if (mysqli_query($koneksi,$sql)) {
					// jika berhasil
					$_SESSION["message"] = array(
						"type" => "success",
						"message" => "Update data berhasil"
					);
				}else{
					// jika gagal
					$_SESSION["message"] = array(
						"type" => "danger",
						"message" => mysqli_error($koneksi)
					);
				}
			header("location:page_admin.php?page=seller");
		}
	}

	if (isset($_GET["hapus"])) {
		$id_seller = $_GET["id_seller"];
		$sql = "select * from seller where id_seller = '$id_seller'";
		$result = mysqli_query($koneksi,$sql);
		$hasil = mysqli_fetch_array($result);
		$sql = "delete from seller where id_seller = '$id_seller'";
		mysqli_query($koneksi,$sql); //eksekusi sintaks sql
		header("location:page_admin.php?page=seller");
	}
 ?>
