<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Kartu Anggota</title>
	<link rel="stylesheet" href="">
</head>
<body>
<table width="335" height="215" border="1" style="border-collapse:collapse;">
  <tr>
  	<?php foreach ($reg as $key) { ?>
	    <td width="86" height="71" align="center"><img src="<?php echo base_url('asset/logo/'.$key->logo) ?>" alt="" style="height: 55px;"></td>
	    <td width="233" valign="top" align="center" style="font-size: 12px; font-weight: bold; font-family: arial;">
	    	<br>PERPUSTAKAAN SEKOLAH<br>
	    	<?php echo $key->nama_sekolah; ?><br>
	    	<?php echo $key->alamat; ?><br>	    	

	    </td>
	<?php } ?>
  </tr>
  <tr>
    <td valign="top" align="center"><br>
		<table width="71" border="1" style="border-collapse:collapse; font-size:11px;">
		  <tr>
			<td height="106" align="center">2x3</td>
		  </tr>
		</table>
	</td>
    <td valign="top" align="center" style="font-size: 12px;">
    	<b>KARTU ANGGOTA</b><br>	
    	<table border="0" width="100%">
			<?php foreach ($anggota as $key1) { ?>
			<tr>
				<td width="5%">Nama</td>
				<td width="1%">:</td>
				<td><?php echo $key1->nama ?></td>
			</tr>
			<tr>
				<td>NIS</td>
				<td width="1%">:</td>
				<td><?php echo $key1->nis ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td width="1%">:</td>
				<td><?php echo $key1->nama_kelas." / ".$key1->nama_rombel ?></td>
			</tr>
    	</table>
    	<img src="<?php echo site_url()?>buku/barcode/<?php echo $key1->id_anggota;?>" height="54">
		<?php } ?>
    </td>
  </tr>
</table>
	
</body>
</html>