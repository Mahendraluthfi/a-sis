<h3><?php echo $title; ?></h3>
<table class="table table-bordered table-hover">
	<thead>
		<tr class="info">
			<th width="1%">No</th>
			<th>No_Peminjaman</th>
			<th>ID_Anggota</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Denda</th>			
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; $total = 0;
		foreach ($view as $key) { 
		$total = $total + $key->ttl;	?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $key->no_peminjaman; ?></td>
			<td><?php echo $key->id_anggota; ?></td>
			<td><?php echo $key->tanggal_pinjam; ?></td>
			<td><?php echo $key->tanggal_kembali; ?></td>
			<td><?php echo number_format($key->ttl); ?></td>
			<td><?php echo $key->status; ?></td>			
		</tr>		
		<?php } ?>
		<tr>
			<th colspan="5" class="text-right">Total</th>
			<td colspan="2"><?php echo number_format($total); ?></td>
		</tr>
	</tbody>
</table>
