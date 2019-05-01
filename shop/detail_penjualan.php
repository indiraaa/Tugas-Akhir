</head>
<body>
	<div class="container">
		<!-- <div class="card col-sm-12"> -->
			<!-- <div class="card-header text-center bg-dark text-white"> -->
				<h4 style="margin-top: 20px; margin-bottom: 20px; font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">Sales Details</h4>
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
					$sql = "select produk.id_produk, produk.nama_produk, produk.image, detail_penjualan.id_penjualan, detail_penjualan.jumlah, detail_penjualan.waktu from detail_penjualan inner join produk on detail_penjualan.id_produk = produk.id_produk order by detail_penjualan.waktu desc";
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
								<td>ID Product</td>
								<td>Product Name</td>
								<td>Quantity</td>
								<td>Date</td>
								<td>Image</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($result as $hasil): ?>
								<tr>
									<td><?php echo $hasil["id_penjualan"] ?></td>
									<td><?php echo $hasil["id_produk"] ?></td>
									<td><?php echo $hasil["nama_produk"]; ?></td>
									<td><?php echo $hasil["jumlah"]; ?></td>
									<td><?php echo $hasil["waktu"] ?></td>
									<td>
										<img src="<?php echo"img_barang/".$hasil["image"]; ?>" id="<?php echo $hasil["id_produk"]; ?>" class="img" style="width: 100px;">
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				<?php endif ?>
		</div>
