<section class="content-header">  
  <h1>
    <a href="<?php echo base_url('inputbayar/form') ?>"><span class="glyphicon glyphicon-chevron-left"></span></a>Print Preview
     <small>
    	<a href="" class="btn btn-success btn-xs" onclick="cetak()">Cetak</a>
    	<a href="<?php echo base_url('inputbayar/save_p/'.$this->uri->segment(3)) ?>" class="btn btn-primary btn-xs" onclick="return confirm('Simpan Data ?')">Simpan</a>
    </small>
  </h1>
  <div class="pull-right">
  <?php echo $halaman; ?>	 	
  </div>
</section>
<body>
	<table width="450" style="font-size: 12px;">		
		<?php $no = $offset + 1;
		 foreach ($set as $data) { 
		 	if ($data->cek_p == "1") { ?>
			<tr>
				<td align="center" width="26"><?php $no++; ?></td>
				<td align="center" width="68">&nbsp;</td>
				<td width="45">&nbsp;</td>
				<td class="text-right" width="100">&nbsp;</td>
				<td class="text-right" width="100">&nbsp;</td>
				<td class="text-right">&nbsp;</td>
			</tr>
			<?php }else{ ?>
			<tr>
				<td align="center" width="26"><?php echo $no++; ?></td>
				<td align="center" width="68"><?php echo date('d/m/y', strtotime($data->date)); ?></td>
				<td width="45"><?php echo $data->kode_jenis ?></td>
				<td class="text-right" width="100"><?php echo number_format($data->bayar) ?></td>
				<td class="text-right" width="100"><?php echo $data->ket ?></td>
				<td class="text-right"></td>
			</tr>
		<?php }} ?>
	</table>
</body>

<script>
	function cetak() {
		window.print();
	}
</script>