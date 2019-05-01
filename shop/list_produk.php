<?php
	$koneksi = mysqli_connect("localhost", "root", "", "shop");
	$sql = "select * from produk";
	$result = mysqli_query($koneksi,$sql);
 ?>


 <div class="row" id="table_produk">
 	<?php foreach ($result as $hasil): ?>
 		<div class="card col-md-3 kartu">
 			<div class="card-header text-center justify-content-center bg-light">
 				<img src="img_barang/<?php echo $hasil["image"]; ?>" class="img">
 			</div>
 			<div class="card-body text-left">
				<tr>
					<hr class="hr1">
					<td><h5><?php echo $hasil["nama_produk"] ?></h5></td>
					<hr>
					<td><h6>Type : <?php echo $hasil["jenis"]; ?></h6></td>
					<td><h6>Decription : </h6><q><?php echo $hasil["deskripsi"]; ?></q></td>
					<hr>
					<td><h6>Price : Rp<?php echo number_format($hasil["harga"])  ?></h6></td>
					<td><h6>Stock : <?php echo $hasil["stok"] ?></h6></td>
					</td>
				</tr>
 			</div>
 			<div class="card-footer">
 				<a href="db_beli.php?beli=true&id_produk=<?php echo $hasil["id_produk"]; ?>"><button class="btn btn-block btn-sm btn-success">BUY</button></a>
 			</div>
 		</div>
 	<?php endforeach ?>
 </div>
