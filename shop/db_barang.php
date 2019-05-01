<?php
	session_start();
	$koneksi = mysqli_connect("localhost","root","","shop");

	if (isset($_POST["action"])) {
		$id_produk = $_POST["id_produk"];
		$nama = $_POST["nama"];
		$jenis = $_POST["jenis"];
		$deskripsi = $_POST["deskripsi"];
		$harga = $_POST["harga"];
		$stok = $_POST["stok"];

		if ($_POST["action"] == "insert") {
			// menentukan nama file
			$path = pathinfo($_FILES["image"]["name"]);
			$ekstensi = $path["extension"];
			$filename = $id_produk."-".rand(1,1000).".".$ekstensi;
			//membuat query
			$sql = "insert into produk values ('$id_produk', '$nama', '$jenis', '$deskripsi', '$harga', '$stok', '$filename')";
			if (mysqli_query($koneksi,$sql)) {
				// jika berhasil
				move_uploaded_file($_FILES["image"]["tmp_name"], "img_barang/".$filename);
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
			header("location:page_admin.php?page=barang");
		}elseif ($_POST["action"] == "update") {
			if (!empty($_FILES['image']['name'])) {
				// jika gambar diedit
				$sql = "select * from produk where id_produk='$id_produk'";
				$result = mysqli_query($koneksi,$sql);
				$hasil = mysqli_fetch_array($result);
				// hapus file lama
				if (file_exists("img_barang/".$hasil["image"])) {
					unlink("img_barang/".$hasil["image"]);
				}
				$path = pathinfo($_FILES["image"]["name"]);
				$ekstensi = $path["extension"];
				$filename = $id_produk."-".rand(1,1000).".".$ekstensi;
				$sql = "update produk set nama_produk='$nama', jenis='$jenis', deskripsi='$deskripsi', harga='$harga', stok='$stok', image='$filename' where id_produk='$id_produk'";
				if (mysqli_query($koneksi,$sql)) {
					// jika berhasil
					move_uploaded_file($_FILES["image"]["tmp_name"], "img_barang/".$filename);
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
				$sql = "update produk set nama_produk='$nama', jenis='$jenis', deskripsi='$deskripsi', harga='$harga', stok='$stok' where id_produk='$id_produk'";
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
			header("location:page_admin.php?page=barang");
		}
	}

	if (isset($_GET["hapus"])) {
		$id_produk = $_GET["id_produk"];
		$sql = "select * from produk where id_produk = '$id_produk'";
		$result = mysqli_query($koneksi,$sql);
		$hasil = mysqli_fetch_array($result);
		if (file_exists("img_barang/".$hasil["image"])) {
			// cek keberadaan file
			unlink("img_barang/".$hasil["image"]);
			// menghapus file
		}
		$sql = "delete from produk where id_produk = '$id_produk'";
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
		header("location:page_admin.php?page=barang");
	}
 ?>
