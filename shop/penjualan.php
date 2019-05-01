</head>
<body>
	<div class="container">
		<!-- <div class="card col-sm-12"> -->
			<!-- <div class="card-header text-center bg-dark text-white"> -->
				<h4 style="margin-top: 20px; margin-bottom: 20px; font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">List Sales</h4>
			<!-- </div> -->
			<!-- <div class="card-body"> -->
				<?php
					// membuat koneksi
					$koneksi = mysqli_connect("localhost","root","","shop");
					// cek kesalahan
					if (mysqli_connect_errno()) {
						echo mysqli_connect_error();
					}
					// menampilkan tabel
					$sql = "select penjualan.id_penjualan, penjualan.waktu, pembeli.id_pembeli, pembeli.nama_pembeli from penjualan inner join pembeli on penjualan.id_pembeli = pembeli.id_pembeli order by penjualan.waktu desc";
					$result = mysqli_query($koneksi,$sql);
					// eksekusi
					$count = mysqli_num_rows($result);
				 ?>

				<?php if ($count == 0): ?>
					<div class="alert alert-info">
						Data Masih Kosong Bos
					</div>
				<?php else: ?>
					<table class="table table-hover" id="table_produk" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">
						<thead>
							<tr>
								<td>ID Sales</td>
								<td>ID Customer</td>
								<td>Customer Name</td>
								<td>Date</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $hasil): ?>
								<tr>
									<td><?php echo $hasil["id_penjualan"] ?></td>
									<td><?php echo $hasil["id_pembeli"] ?></td>
									<td><?php echo $hasil["nama_pembeli"] ?></td>
									<td><?php echo $hasil["waktu"]; ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				<?php endif ?>
			<!-- </div> -->
			<!-- <div class="card-footer"> -->
				<!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal" onclick="Tambah()">
					Add products
				</button> -->
			<!-- </div> -->
		</div>
	<!-- </div> -->
	<!-- modal -->
	<!-- <div class="modal fade" id="modal">
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
	</div> -->
