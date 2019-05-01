	<script type="text/javascript">
		function Edit(index) {
			document.getElementById('action').value = "update";
			document.getElementById('judul').innerHTML = "Edit Seller";
			var table = document.getElementById('table_seller');
			var id_seller = table.rows[index].cells[0].innerHTML;
			var nama = table.rows[index].cells[1].innerHTML;
			var username = table.rows[index].cells[2].innerHTML;
			var password = table.rows[index].cells[3].innerHTML;
			var kontak = table.rows[index].cells[4].innerHTML;

			document.getElementById('id_seller').value = id_seller;
			document.getElementById('nama').value = nama;
			document.getElementById('username').value = username;
			document.getElementById('password').value = password;
			document.getElementById('kontak').value = kontak;
		}
		function Tambah() {
			document.getElementById('action').value = "insert";
			document.getElementById('judul').innerHTML = "Add Sellers";
			document.getElementById('id_seller').value = "";
			document.getElementById('nama').value = "";
			document.getElementById('username').value = "";
			document.getElementById('password').value = "";
			document.getElementById('kontak').value = "";
		}
	</script>
	<div class="container">
		<!-- <div class="card col-sm-12"> -->
			<!-- <div class="card-header text-center bg-dark text-white"> -->
				<h4 style="margin-top: 20px; margin-bottom: 20px; font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">List Sellers</h4>
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
					$sql = "select * from seller";
					$result = mysqli_query($koneksi,$sql);
					// eksekusi
					$count = mysqli_num_rows($result);
				 ?>

				<?php if ($count == 0): ?>
					<div class="alert alert-info">
						Data Masih Kosong Bos
					</div>
				<?php else: ?>
					<table class="table table-hover" id="table_seller" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">
						<thead>
							<tr>
								<td>ID Seller</td>
								<td>Seller Name</td>
								<td>Username</td>
								<td>Password</td>
								<td>Contact</td>
								<td>Option</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $hasil): ?>
								<tr>
									<td><?php echo $hasil["id_seller"] ?></td>
									<td><?php echo $hasil["nama_seller"] ?></td>
									<td><?php echo $hasil["username"]; ?></td>
									<td><?php echo $hasil["password"]; ?></td>
									<td><?php echo $hasil["kontak"] ?></td>
									<td>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal" onclick="Edit(this.parentElement.parentElement.rowIndex)">
											<span class="far fa-edit" style="font-size: 20px;"></span>
										</button>
										<a href="db_seller.php?hapus=seller&id_seller=<?php echo $hasil["id_seller"]; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">
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
					Add Sellers
				</button>
			<!-- </div> -->
		</div>
	<!-- </div> -->
	<!-- modal -->
	<div class="modal fade" id="modal" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form action="db_seller.php" method="post" enctype="multipart/form-data">
					<div class="modal-header">
						<h4 id="judul" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;"></h4>
						<span class="close" data-dismiss="modal">&times;</span>
					</div>
					<div class="modal-body">
						<input type="hidden" name="action" id="action">
						ID Seller : <input type="text" name="id_seller" id="id_seller" class="form-control">
						Seller Name : <input type="text" name="nama" id="nama" class="form-control">
						Username : <input type="text" name="username" id="username" class="form-control">
						Password : <input type="password" name="password" id="password" class="form-control">
						Contact : <input type="text" name="kontak" id="kontak" class="form-control">
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
