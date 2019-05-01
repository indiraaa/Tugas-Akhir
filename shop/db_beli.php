<?php
	session_start();
	if (isset($_GET["beli"])) {
		$koneksi = mysqli_connect("localhost","root","","shop");
		$id_produk = $_GET["id_produk"];
		$sql = "select * from produk where id_produk = '$id_produk'";
		$result = mysqli_query($koneksi,$sql);
		$hasil = mysqli_fetch_array($result);

		if (!in_array($hasil,$_SESSION["session_beli"])) {
			array_push($_SESSION["session_beli"],$hasil);
		}
		header("location:page_pembeli.php?page=list_produk");
	}

	if (isset($_GET["checkout"])) {
		$koneksi = mysqli_connect("localhost","root","","shop");
		$id_penjualan = rand(1,1000).date("dmY");
		$id_pembeli = $_SESSION["session_pembeli"]["id_pembeli"];
		$tgl_beli = date("Y-m-d");
		$sql = "insert into penjualan values ('$id_penjualan', '$id_pembeli', '$tgl_beli')";
		if (mysqli_query($koneksi,$sql)) {
			// insert ke detail_penjualan
		foreach ($_SESSION["session_beli"] as $hasil) {
			$id_produk = $hasil["id_produk"];
			$jumlah = $_POST["jumlah"];
			$harga = $hasil["harga"];
			$sql = "insert into detail_penjualan values('$id_penjualan','$id_produk','$jumlah','$harga', '$tgl_beli')";
			// echo $sql;
			mysqli_query($koneksi,$sql);
		}
		$_SESSION["session_beli"] = array();
		header("location:page_pembeli.php?page=nota&id_penjualan=$id_penjualan");
		}
	}

	if (isset($_GET["hapus"])) {
		$id_produk = $_GET["id_produk"];
		$index = array_search($id_produk,array_column($_SESSION["session_beli"],"id_produk"));
		array_splice($_SESSION["session_beli"],$index,1);
		header("location:page_pembeli.php?page=list_penjualan");
	}
 ?>
