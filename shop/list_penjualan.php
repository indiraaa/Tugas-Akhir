<div class="card col-sm-6 kartu1">
	<div class="card-header text-dark">
		<h3>Cart</h3>
	</div>
	<div class="card-body">
		<form action="db_beli.php?checkout=true" method="post" onsubmit="return confirm('Apakah anda yakin dengan pesanan ini?')">
			<table class="table">
			<tbody>
				<?php foreach ($_SESSION["session_beli"] as $hasil): ?>
					<hr>
					<div class="modal-body" style="column-count: 2; column-rule-style: solid; column-rule-width: 0px; column-gap: 10px;">
					<img src="img_barang/<?php echo $hasil["image"]; ?>" class="img">
					<div class="right">
						<h6>Product Name : <?php echo $hasil["nama_produk"]; ?></h6>
						<h6>Type : <?php echo $hasil["jenis"]; ?></h6>
						<input type="number" name="jumlah<?php echo $hasil["id_barang"] ?>" value="1" min="1" required>
 						<h6>Price : Rp<?php echo number_format($hasil["harga"]); ?></h6>
 						<a href="db_beli.php?hapus=true&id_produk=<?php echo $hasil["id_produk"]; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">
							<button type="button" class="btn btn-danger">
								<span class="far fa-trash-alt" style="font-size: 20px;"></span>
							</button>
						</a>
					</div>
					</div>
				<hr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="db_beli.php?checkout=true">
			<button type="submit" class="btn btn-success">Checkout</button>
		</a>
		</form>
	</div>
</div>