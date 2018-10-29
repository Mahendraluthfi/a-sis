<section class="content-header">
  <h1>
  Laporan Neraca Lajur &nbsp; <button type="button" class="btn btn-primary btn-sm" id="btnprint"><span class="glyphicon glyphicon-print"></span> Print</button>          	    	
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Laporan Neraca Lajur</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          	<?php foreach ($anggaran as $key): ?>
          	    <legend><?php echo $key->nm_anggaran ?></legend>
          	<?php endforeach ?>       		          	    
        </div>
      <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
	          	<table class="table table-bordered table-striped">          	
	      			<tr class="info">
	      				<th rowspan="2"">Akun</th>
	      				<th colspan="2">Neraca Saldo</th>
	      				<th colspan="2">Penyesuaian</th>
	      				<th colspan="2">Rugi / Laba</th>
	      				<th colspan="2">Neraca</th>	      				
	      			</tr>          		
	      			<tr>	      				
	      				<th>Debet</th>
	      				<th>Kredit</th>
	      				<th>Debet</th>
	      				<th>Kredit</th>
	      				<th>Debet</th>
	      				<th>Kredit</th>
	      				<th>Debet</th>
	      				<th>Kredit</th>
	      			</tr>    
	      			<?php $t1 = 0; 
	      			foreach ($akun as $data) { 

	      				?>
	      			<tr>
	      				<td><?php echo $data->nama_akun ?></td>
	      				<?php foreach ($data->saldo as $datasaldo) { 	      						      					
	      				?>
		      				<td><?php if($datasaldo->dbt == null ) { echo ""; } else{ echo "Rp. ".number_format($datasaldo->dbt); } ?></td>
		      				<td><?php if($datasaldo->kdt == null ) { echo ""; } else{ echo "Rp. ".number_format($datasaldo->kdt); } ?></td>		      				
	      				<?php }
	      				foreach ($data->penyesuaian as $datapenyesuaian) { 	      					
	      				?>
		      				<td><?php if($datapenyesuaian->dbt1 == null ) { echo ""; } else{ echo "Rp. ".number_format($datapenyesuaian->dbt1); } ?></td>
		      				<td><?php if($datapenyesuaian->kdt1 == null ) { echo ""; } else{ echo "Rp. ".number_format($datapenyesuaian->kdt1); } ?></td>		      				
	      				<?php }
	      				foreach ($data->labarugi as $datalabarugi) { 	      					
	      				?>
		      				<td><?php if($datalabarugi->dbt2 == null ) { echo ""; } else{ echo "Rp. ".number_format($datalabarugi->dbt2); } ?></td>
		      				<td><?php if($datalabarugi->kdt2 == null ) { echo ""; } else{ echo "Rp. ".number_format($datalabarugi->kdt2); } ?></td>		      				
	      				<?php }	
	      				foreach ($data->neraca as $dataneraca) { 	      					
	      				?>
		      				<td><?php if($dataneraca->dbt3 == null ) { echo ""; } else{ echo "Rp. ".number_format($dataneraca->dbt3); } ?></td>
		      				<td><?php if($dataneraca->kdt3 == null ) { echo ""; } else{ echo "Rp. ".number_format($dataneraca->kdt3); } ?></td>		      				
	      				<?php }	?>
	      			</tr>      		
	      			<?php } ?>
	      			<tr>
	      				<th>Total</th>
	      				<?php $sdbt = 0; $skdt = 0; $sdbt2 = 0; $skdt2 = 0; $sdbt3 = 0; $skdt3 = 0; 
	      				foreach ($jumlah_saldo as $jsaldo) {
	      					$sdbt = $sdbt + $jsaldo->dbt;
	      					$skdt = $skdt + $jsaldo->kdt;
	      				}
	      					      				
	      				foreach ($jumlah_labarugi as $jlabarugi) {
	      					$sdbt2 = $sdbt2 + $jlabarugi->dbt2;
	      					$skdt2 = $skdt2 + $jlabarugi->kdt2;
	      				 }

	      				foreach ($jumlah_neraca as $jneraca) {
	      					$sdbt3 = $sdbt3 + $jneraca->dbt3;
	      					$skdt3 = $skdt3 + $jneraca->kdt3;
	      				}
	      				if ($sdbt2 > $skdt2) {
	      					$jlbdbt = $sdbt2 - $skdt2;	
	      					$jlbkdt = 0;	
	      					$endlb = $sdbt2;
	      				}elseif ($sdbt2 < $skdt2) {
	      					$jlbdbt = 0;	
	      					$jlbkdt = $skdt2 - $sdbt2;	
	      					$endlb = $skdt2;	      					
	      				}else{
	      					$jlbdbt = 0;	
	      					$jlbkdt = 0;	
	      					$endlb = $sdbt2;	      						      					
	      				}
	      				if ($sdbt3 > $skdt3) {
	      					$jndbt = $sdbt3 - $skdt3;	
	      					$jnkdt = 0;	
	      					$endn = $sdbt3;	      					
	      				}elseif ($sdbt3 < $skdt3) {
	      					$jndbt = 0;	
	      					$jnkdt = $skdt3 - $sdbt3;	
	      					$endn = $skdt3;	      						      					
	      				}else{
	      					$jndbt = 0;	
	      					$jnkdt = 0;	
	      					$endn = $sdbt3;	      						      					
	      				}

	      				?>
	      				<th><u><?php echo "Rp. ".number_format($sdbt) ?></u></th>
	      				<th><u><?php echo "Rp. ".number_format($skdt) ?></u></th>		      				
	      				<?php foreach ($jumlah_penyesuaian as $t1) { ?>
		      				<th><u><?php echo "Rp. ".number_format($t1->a) ?></u></th>
		      				<th><u><?php echo "Rp. ".number_format($t1->b) ?></u></th>		      				
	      				<?php } ?>
	      				<th><u><?php echo "Rp. ".number_format($sdbt2) ?></u></th>
	      				<th><u><?php echo "Rp. ".number_format($skdt2) ?></u></th>		      				
	      				<th><u><?php echo "Rp. ".number_format($sdbt3) ?></u></th>
	      				<th><u><?php echo "Rp. ".number_format($skdt3) ?></u></th>	
	      			</tr>
	      			<tr>
	      				<th>Laga/Rugi Bersih</th>
	      				<th></th>
	      				<th></th>
	      				<th></th>
	      				<th></th>
	      				<th><u><?php echo "Rp. ".number_format($jlbkdt) ?></u></th>		      				
	      				<th><u><?php echo "Rp. ".number_format($jlbdbt) ?></u></th>
	      				<th><u><?php echo "Rp. ".number_format($jnkdt) ?></u></th>	
	      				<th><u><?php echo "Rp. ".number_format($jndbt) ?></u></th>
	      			</tr>
	      			<tr>
	      				<th></th>
	      				<th></th>
	      				<th></th>
	      				<th></th>
	      				<th></th>
	      				<th><u><?php echo "Rp. ".number_format($endlb) ?></u></th>		      				
	      				<th><u><?php echo "Rp. ".number_format($endlb) ?></u></th>
	      				<th><u><?php echo "Rp. ".number_format($endn) ?></u></th>	
	      				<th><u><?php echo "Rp. ".number_format($endn) ?></u></th>
	      			</tr>
	          	</table>
          	</div>
          </div>          
        </div>
      </div>
    </div>
  </div>
    <!-- /.box -->    
</section>
<script>
	
</script>