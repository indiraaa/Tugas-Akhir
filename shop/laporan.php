<script type="text/javascript">
	function Print() {
		var printDoc = document.getElementById('report').innerHTML;
		// yang dicetak
		var originalDoc = document.body.innerHTML;
		document.body.innerHTML = printDoc;
		window.print();
		document.body.innerHTML = originalDoc;
	}
</script>
<div id="report" class="container">
		<h4 style="margin-top: 20px; margin-bottom: 20px; font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">Sales Report</h4>
		<?php
			$koneksi = mysqli_connect("localhost","root","","shop");
			$sql = "select t.*, p.nama_pembeli
			from penjualan t inner join pembeli p
			on t.id_pembeli = p.id_pembeli";
			$result = mysqli_query($koneksi,$sql);
		 ?>
		 <table width="100%" class="table table-hover" id="table_produk" style="font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol; font-weight: 400;">
		 	<thead>
		 		<tr>
		 			<td>Date</td>
		 			<td>Sales ID</td>
		 			<td>Customer Name</td>
		 			<td>Option</td>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		<?php foreach ($result as $hasil): ?>
		 			<tr>
		 				<td><?php echo $hasil["waktu"] ?></td>
		 				<td><?php echo $hasil["id_penjualan"] ?></td>
		 				<td><?php echo $hasil["nama_pembeli"] ?></td>
		 				<td>
		 					<a href="page_admin.php?page=nota&id_penjualan=<?php echo $hasil["id_penjualan"] ?>">
		 						<button type="button" class="btn btn-info">
		 							Details
		 						</button>
		 					</a>
		 				</td>
		 			</tr>
		 		<?php endforeach ?>
		 	</tbody>
		 </table>
	<button type="button" class="btn btn-success" onclick="Print()">Print</button>
</div>
