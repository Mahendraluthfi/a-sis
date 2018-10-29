<h3><?php foreach ($get_id as $det) {
  echo $det->nm_anggaran; ?> </h3>
<?php if ($det->status == "1") {
  echo '<button type="button" class="btn btn-default disabled">AKTIF</button>';
}else{ ?>
  <a href="<?php echo base_url('rencana/aktif/'.$det->id) ?>" class="btn btn-info btn-sm" onclick="return confirm('Set Aktif Anggaran ?')">Set Aktif</a>
<?php } ?>
<div class="pull-right">
  <h4>Periode <?php echo date('d M Y', strtotime($det->awal_periode))." / ".date('d M Y', strtotime($det->akhir_periode)) ?></h4>
</div>
<?php } ?>
<br>
<table class="table table-bordered table-hover table-striped">
	<tbody>
		<tr><th colspan="5">Pendapatan</th></tr>
		<!-- <tr>
			<th class="col-md-1"></th>
			<th colspan="4">1. Dana BOS</th>
		</tr>		-->
    <?php $no=1; $total=0;
    foreach ($masuk as $datamasuk) { 
      $total = $datamasuk->nominal + $total ;
      ?>
		<tr>
			<th class="col-md-1"></th>
			<th class="col-md-1"></th>
			<td class="col-md-5"><?php echo $no++.". ".$datamasuk->nm_jenis_trans; ?></td>
			<td class="col-md-3"><?php echo $datamasuk->keterangan ?></td>
			<td class="col-md-2"><?php echo "Rp. ".number_format($datamasuk->nominal); ?></td>
		</tr>
    <?php } ?>

		<tr><th colspan="4">Total Rencana Pendapatan</th><th><?php echo "Rp. ".number_format($total); ?></th></tr>
		<tr><th colspan="5">Pengeluaran</th></tr>
     <?php $no=1; $total1=0;
    foreach ($keluar as $datakeluar) { 
      $total1 = $datakeluar->nominal + $total1 ;
      ?>
    <tr>
      <th class="col-md-1"></th>
      <th class="col-md-1"></th>
      <td class="col-md-5"><?php echo $no++.". ".$datakeluar->nm_jenis_trans; ?></td>
      <td class="col-md-3"><?php echo $datakeluar->keterangan ?></td>
      <td class="col-md-2"><?php echo "Rp. ".number_format($datakeluar->nominal); ?></td>
    </tr>
    <?php } ?>
		<tr><th colspan="4">Total Rencana Pengeluaran</th><th><?php echo "Rp. ".number_format($total1); ?></th></tr>		
	</tbody>
</table>
