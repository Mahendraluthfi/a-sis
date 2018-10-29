<h3><?php echo $title; ?></h3>
<table class="table table-bordered table-hover">
	<thead>
		<tr class="info">
			<th width="1%">No</th>
			<th colspan="2">No_Peminjaman</th>
			<th colspan="2">ID_Anggota</th>
			<th>Tanggal Pinjam</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;
		foreach ($view as $key) { ?>
		<tr>
			<th><?php echo $no++; ?></th>
			<th colspan="2"><?php echo $key->no_peminjaman; ?></th>
			<th colspan="2"><?php echo $key->id_anggota; ?></th>
			<th><?php echo $key->tanggal_pinjam; ?></th>
			<th><?php echo $key->status; ?></th>			
		</tr>
			<?php foreach ($key->detail as $key2) { ?>
				<tr class="active">
					<td></td>
					<td><?php echo $key2->id_detailbuku ?></td>
					<td><?php echo $key2->judul ?></td>
					<td><?php echo $key2->pengarang ?></td>
					<td><?php echo $key2->nama_kategori ?></td>
					<td><?php echo $key2->nama_rak ?></td>
					<td><?php echo $key2->sts ?></td>					
				</tr>			
			<?php } ?>
		<?php } ?>
	</tbody>
</table>
