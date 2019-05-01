<?php
	if (isset($_GET["hapus"])) {
		$koneksi = mysqli_connect("localhost","root","","shop");
		$id_penjualan = $_GET["id_penjualan"];
		$sql = "select * from penjualan where id_penjualan = '$id_penjualan'";
		$sql = "delete from penjualan where id_penjualan = '$id_penjualan'";
		mysqli_query($koneksi,$sql); //eksekusi sintaks sql
		header("location:page_admin.php?page=penjualan");
	}
 ?>
