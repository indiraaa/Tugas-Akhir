<?php
	session_start();

	if (isset($_POST['username'])) {
		// is set?
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$koneksi = mysqli_connect("localhost","root","","shop");
		$sql = "select * from pembeli where username='$username' and password='$password'";
		$result = mysqli_query($koneksi, $sql);
		$jumlah = mysqli_num_rows($result);

		if ($jumlah == 0) {
			$_SESSION["message"] = array(
			"type" => "danger",
			"message" => "Username/Password Salah"
		);
			header("location:login_pembeli.php");
		}else {
			// login berhasil
			// membuat var session
			$_SESSION["session_pembeli"] = mysqli_fetch_array($result);
			$_SESSION["session_beli"] = array();
			header("location:page_pembeli.php?page=list_produk");
		}
	}

	if (isset($_GET["logout"])) {
		// hapus session
		session_destroy();
		header("location:login_pembeli.php");
	}
 ?>
