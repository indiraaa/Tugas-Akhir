	<script type="text/javascript">
		function Edit(index) {
			document.getElementById('action').value = "update";
			document.getElementById('judul').innerHTML = "Edit Product";
			var table = document.getElementById('table_produk');
			var id_produk = table.rows[index].cells[0].innerHTML;
			var nama = table.rows[index].cells[1].innerHTML;
			var jenis = table.rows[index].cells[2].innerHTML;
			var deskripsi = table.rows[index].cells[3].innerHTML;
			var harga = table.rows[index].cells[4].innerHTML;
			var stok = table.rows[index].cells[5].innerHTML;

			document.getElementById('id_produk').value = id_produk;
			document.getElementById('nama').value = nama;
			document.getElementById('jenis').value = jenis;
			document.getElementById('deskripsi').value = deskripsi;
			document.getElementById('harga').value = harga;
			document.getElementById('stok').value = stok;
		}
		function Tambah() {
			document.getElementById('action').value = "insert";
			document.getElementById('judul').innerHTML = "Add Products";
			document.getElementById('id_produk').value = "";
			document.getElementById('nama').value = "";
			document.getElementById('jenis').value = "";
			document.getElementById('deskripsi').value = "";
			document.getElementById('harga').value = "";
			document.getElementById('stok').value = "";
		}
	</script>
</head>
<body>
	<div class="container">
		<!-- <div class="card col-sm-12"> -->
			<!-- <div class="card-header text-center bg-dark text-white"> -->
				<h4 style="margin-top: 20px; margin-bottom: 20px; font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">List Products</h4>
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
					$sql = "select * from produk";
					$result = mysqli_query($koneksi,$sql);
					// eksekusi
					$count = mysqli_num_rows($result);
				 ?>

				<?php if ($count == 0): ?>
					<div class="alert alert-info">
						Data Masih Kosong Bos
					</div>
				<?php else: ?>
					<table width="100%" class="table table-hover" id="table_produk" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400; ">
						<thead>
							<tr>
								<td>ID Product</td>
								<td style="width: 150px;">Product Name</td>
								<td>Type</td>
								<td style="width: 300px;">Description</td>
								<td>Price</td>
								<td>Stock</td>
								<td>Image</td>
								<td>Option</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $hasil): ?>
								<tr>
									<td><?php echo $hasil["id_produk"] ?></td>
									<td><?php echo $hasil["nama_produk"] ?></td>
									<td><?php echo $hasil["jenis"]; ?></td>
									<td><?php echo $hasil["deskripsi"]; ?></td>
									<td><?php echo $hasil["harga"] ?></td>
									<td><?php echo $hasil["stok"] ?></td>
									<td>
										<img src="<?php echo"img_barang/".$hasil["image"]; ?>" id="<?php echo $hasil["id_produk"]; ?>" class="img" style="width: 100px;">
									</td>
									<td>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal" onclick="Edit(this.parentElement.parentElement.rowIndex)">
											<span class="far fa-edit" style="font-size: 20px;"></span>
										</button>
										<a href="db_barang.php?hapus=produk&id_produk=<?php echo $hasil["id_produk"]; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">
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
					Add products
				</button>
			<!-- </div> -->
		</div>
	<!-- </div> -->
	<!-- modal -->
	<div class="modal fade" id="modal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form action="db_barang.php" method="post" enctype="multipart/form-data" id="form_barang">
					<div class="modal-header">
						<h4 id="judul" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;"></h4>
						<span class="close" data-dismiss="modal">&times;</span>
					</div>
					<div class="modal-body">
						<input type="hidden" name="action" id="action">
						ID Product : <input type="text" name="id_produk" id="id_produk" class="form-control">
						Product Name : <input type="text" name="nama" id="nama" class="form-control">
						Type : <input type="text" name="jenis" id="jenis" class="form-control">
						Description : <textarea form="form_barang" name="deskripsi" id="deskripsi" class="form-control"> </textarea>
						Price : <input type="number" name="harga" id="harga" class="form-control">
						Stock : <input type="number" name="stok" id="stok" class="form-control">
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
