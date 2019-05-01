<?php
	session_start();
	$koneksi = mysqli_connect("localhost","root","","shop");

	if (isset($_POST["action"])) {
		$id_pembeli = $_POST["id_pembeli"];
		$nama = $_POST["nama"];
		$user = $_POST["username"];
		$pass = md5($_POST["password"]);
		$kontak = $_POST["kontak"];
		$alamat = $_POST["alamat"];

		if ($_POST["action"] == "insert") {
			// menentukan nama file
			$path = pathinfo($_FILES["image"]["name"]);
			$ekstensi = $path["extension"];
			$filename = $id_pembeli."-".rand(1,1000).".".$ekstensi;
			//membuat query
			$sql = "insert into pembeli values ('$id_pembeli', '$nama', '$user', '$pass', '$alamat', '$kontak', '$filename')";
			if (mysqli_query($koneksi,$sql)) {
				// jika berhasil
				move_uploaded_file($_FILES["image"]["tmp_name"], "img_pembeli/".$filename);
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
			header("location:page_admin.php?page=pembeli");
		}elseif ($_POST["action"] == "update") {
			if (!empty($_FILES['image']['name'])) {
				// jika gambar diedit
				$sql = "select * from pembeli where id_pembeli='$id_pembeli'";
				$result = mysqli_query($koneksi,$sql);
				$hasil = mysqli_fetch_array($result);
				// hapus file lama
				if (file_exists("img_pembeli/".$hasil["image"])) {
					unlink("img_pembeli/".$hasil["image"]);
				}
				$path = pathinfo($_FILES["image"]["name"]);
				$ekstensi = $path["extension"];
				$filename = $id_pembeli."-".rand(1,1000).".".$ekstensi;
				$sql = "update pembeli set nama_pembeli='$nama', username='$user', password='$pass', alamat='$alamat', kontak='$kontak', image='$filename' where id_pembeli='$id_pembeli'";
				if (mysqli_query($koneksi,$sql)) {
					// jika berhasil
					move_uploaded_file($_FILES["image"]["tmp_name"], "img_pembeli/".$filename);
					// pesan sukses
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
			}else{
				// jika gambar tidak diedit
				$sql = "update pembeli set nama_pembeli='$nama', username='$user', password='$pass', alamat='$alamat', kontak='$kontak' where id_pembeli='$id_pembeli'";
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
			}
			header("location:page_admin.php?page=pembeli");
		}
	}

	if (isset($_GET["hapus"])) {
		$id_pembeli = $_GET["id_pembeli"];
		$sql = "select * from pembeli where id_pembeli = '$id_pembeli'";
		$result = mysqli_query($koneksi,$sql);
		$hasil = mysqli_fetch_array($result);
		$sql = "delete from pembeli where id_pembeli = '$id_pembeli'";
		mysqli_query($koneksi,$sql); //eksekusi sintaks sql
		header("location:page_admin.php?page=pembeli");
	}
 ?>
