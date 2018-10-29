<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Barcode</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div align="center">
	<?php foreach ($buku as $data) { ?>
	<h3><?php echo $data->judul ?></h3>
	<h5><?php echo $data->id_buku ?></h5>
	<h5><?php echo "tahun_terbit : ".$data->tahun_terbit ?></h5>
	<h5><?php echo "Rak : ".$data->nama_rak ?></h5>
	<?php } ?>
	<hr width="50%">
	<table width="50%" cellpadding="5px">
		<tr>
			<td style="border-bottom: solid;">ID_DETAILBUKU</td>
			<td style="border-bottom: solid;">BARCODE</td>			
		</tr>
		<?php foreach ($detail as $key) { ?>
		<tr>
			<td><?php echo $key->id_detailbuku ?></td>
			<td>
				<img src="<?php echo site_url()?>buku/barcode/<?php echo $key->id_detailbuku;?>" height="50">
			</td>			
		</tr>
		<?php } ?>
	</table>
	</div>
</body>
</html>
<script>
	window.print();
</script>