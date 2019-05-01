	<script type="text/javascript">
		function Edit(index) {
			document.getElementById('action').value = "update";
			document.getElementById('judul').innerHTML = "Edit Customer";
			var table = document.getElementById('table_pembeli');
			var id_pembeli = table.rows[index].cells[0].innerHTML;
			var nama = table.rows[index].cells[1].innerHTML;
			var username = table.rows[index].cells[2].innerHTML;
			var password = table.rows[index].cells[3].innerHTML;
			var alamat = table.rows[index].cells[4].innerHTML;
			var kontak = table.rows[index].cells[5].innerHTML;

			document.getElementById('id_pembeli').value = id_pembeli;
			document.getElementById('nama').value = nama;
			document.getElementById('username').value = username;
			document.getElementById('password').value = password;
			document.getElementById('alamat').value = alamat;
			document.getElementById('kontak').value = kontak;
		}
		function Tambah() {
			document.getElementById('action').value = "insert";
			document.getElementById('judul').innerHTML = "Add Customers";
			document.getElementById('id_pembeli').value = "";
			document.getElementById('nama').value = "";
			document.getElementById('username').value = "";
			document.getElementById('password').value = "";
			document.getElementById('alamat').value = "";
			document.getElementById('kontak').value = "";
		}
	</script>
<body>
	<div class="container">
		<!-- <div class="card col-sm-12"> -->
			<!-- <div class="card-header text-center bg-dark text-white"> -->
				<h4 style="margin-top: 20px; margin-bottom: 20px; font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">List Customers</h4>
			<!-- </div> -->
			<!-- <div class="card-body"> -->
				<?php if (isset($_SESSION["message"])): ?>
        <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
          <?php echo $_SESSION["message"]["message"]; ?>
          <?php unset($_SESSION["message"]); ?>
        </div>
      <?php endif; ?>
				<?php
					// membuat koneksi
					$koneksi = mysqli_connect("localhost","root","","shop");
					// cek kesalahan
					if (mysqli_connect_errno()) {
						echo mysqli_connect_error();
					}
					// menampilkan tabel
					$sql = "select * from pembeli";
					$result = mysqli_query($koneksi,$sql);
					// eksekusi
					$count = mysqli_num_rows($result);
				 ?>

				<?php if ($count == 0): ?>
					<div class="alert alert-info">
						Data Masih Kosong Bos
					</div>
				<?php else: ?>
					<table class="table table-hover" id="table_pembeli" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">
						<thead>
							<tr>
								<td>ID Customer</td>
								<td>Customer Name</td>
								<td>Username</td>
								<td>Password</td>
								<td>Address</td>
								<td>Contact</td>
								<td>Image</td>
								<td>Option</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $hasil): ?>
								<tr>
									<td><?php echo $hasil["id_pembeli"] ?></td>
									<td><?php echo $hasil["nama_pembeli"] ?></td>
									<td><?php echo $hasil["username"]; ?></td>
									<td><?php echo $hasil["password"]; ?></td>
									<td><?php echo $hasil["alamat"]; ?></td>
									<td><?php echo $hasil["kontak"] ?></td>
									<td>
										<img src="<?php echo"img_pembeli/".$hasil["image"]; ?>" id="<?php echo $hasil["id_pembeli"]; ?>" class="img" style="width: 100px;">
									</td>
									<td>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal" onclick="Edit(this.parentElement.parentElement.rowIndex)">
											<span class="far fa-edit" style="font-size: 20px;"></span>
										</button>
										<a href="db_pembeli.php?hapus=pembeli&id_pembeli=<?php echo $hasil["id_pembeli"]; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">
											<button type="button" class="btn btn-danger">
												<span class="far fa-trash-alt" style="font-size: 20px;"></span>
											</button>
										</a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				<?php endif ?>
			<!-- </div> -->
			<!-- <div class="card-footer"> -->
				<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal" onclick="Tambah()">
					Add Customers
				</button>
			<!-- </div> -->
		</div>
	<!-- </div> -->
	<div class="modal fade" id="modal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form action="db_pembeli.php" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 id="judul" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;"></h4>
						<span class="close" data-dismiss="modal">&times;</span>
					</div>
					<div class="modal-body">
						<input type="hidden" name="action" id="action">
						ID Customer : <input type="text" name="id_pembeli" id="id_pembeli" class="form-control">
						Cutomer Name : <input type="text" name="nama" id="nama" class="form-control">
						Username : <input type="text" name="username" id="username" class="form-control">
						Password : <input type="password" name="password" id="password" class="form-control">
						Address : <input type="text" name="alamat" id="alamat" class="form-control">
						Contact : <input type="text" name="kontak" id="kontak" class="form-control">
						Image : <input type="file" name="image" id="image" class="form-control">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">
							<span class="fas fa-check" style="font-size: 20px;"></span> Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
