<div class="card col-sm-12">
	<div class="card-header">
		<h3>Payment Note</h3>
	</div>
	<div class="card-body">
		<?php
			$koneksi = mysqli_connect("localhost","root","","shop");
			// data penjualan
			$id_penjualan = $_GET["id_penjualan"];
			$sql = "select p.*, pe.nama_pembeli
			from penjualan p inner join pembeli pe
			on p.id_pembeli = pe.id_pembeli
			where p.id_penjualan = '$id_penjualan'";
			// echo $sql;
			$result = mysqli_query($koneksi,$sql);
			$penjualan = mysqli_fetch_array($result);
			// data barang
			$sql2 = "select b.*, dp.jumlah, dp.harga
			from detail_penjualan dp inner join produk b
			on dp.id_produk = b.id_produk
			where dp.id_penjualan = '$id_penjualan'";
			// echo $sql2;
			$result2 = mysqli_query($koneksi,$sql2);
		 ?>

		 <h4>Transaction ID : <?php echo $penjualan["id_penjualan"]; ?></h4>
		 <h4>Customer Name : <?php echo $penjualan["nama_pembeli"]; ?></h4>
		 <h4>Date : <?php echo $penjualan["waktu"] ?></h4>

		 <table class="table" id="tb1">
		 	<thead>
		 		<tr>
		 			<th>Product ID</th>
		 			<th>Product Name</th>
		 			<th>Price</th>
		 			<th>Quantity</th>
		 			<th>Image</th>
		 			<th>Total</th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		<?php $total = 0; foreach ($result2 as $hasil): ?>
		 			<tr>
		 				<td><?php echo $hasil["id_produk"] ?></td>
		 				<td><?php echo $hasil["nama_produk"] ?></td>
		 				<td><?php echo number_format($hasil["harga"]) ?></td>
		 				<td><?php echo $hasil["jumlah"] ?></td>
		 				<td>
							<img src="<?php echo"img_barang/".$hasil["image"]; ?>" id="<?php echo $hasil["id_produk"]; ?>" class="img" style="width: 100px;">
						</td>
		 				<td><?php echo number_format($hasil["jumlah"]*$hasil["harga"]) ?></td>
		 			</tr>
		 		<?php
		 			$total += $hasil["jumlah"]*$hasil["harga"];
		 		endforeach ?>
		 	</tbody>
		 </table>
		 <h2>Total : Rp<?php echo number_format($total); ?></h2>
	</div>
</div>
