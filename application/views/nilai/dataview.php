<section class="content-header">
  <h1>
    Data Nilai
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('datanilai') ?>">Data Nilai</a></li>
    <li class="active">Lihat Nilai</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
			<div class="box box-primary">            	         
		    	<div class="box-body">
		    		<div class="pull-right">
		    			<?php echo "Data ".$jml." / ".$all; ?>&nbsp;		    			
		    			<div class='btn-group'><button type='button' class='btn btn-success'><i class="glyphicon glyphicon-print"></i></button><button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown'><span class='caret'></span><span class='sr-only'>Toggle Dropdown</span></button><ul class='dropdown-menu' role='menu'><li><a href='<?php echo base_url('datanilai/view_print/pdf') ?>'>PDF</a></li><li><a href='<?php echo base_url('datanilai/view_print/excel') ?>'>Excel</a></li></ul></div>
		    		</div>
		    		<?php foreach ($mapel as $key): ?>
		    		<h4><?php echo $key->nama_mapel ?></h4>
		    		<?php endforeach ?>
		    		<?php foreach ($rombel as $key1): ?>
		    		<h4><?php echo $key1->nama_rombel." (Semester ".$this->session->userdata('smt').")" ?></h4>
		    		<?php endforeach ?>
		    		<div class="row">						
						<div class="col-sm-12 col-md-12 col-lg-12">
							<table class="table table-bordered table-hover" id="example">
								<thead>
									<tr class="active">
										<th width="1%">No</th>
										<th>NIS</th>
										<th>Nama</th>
										<th>NUH1</th>
										<th>NUH2</th>
										<th>NUH3</th>
										<th>NT1</th>
										<th>NT2</th>
										<th>NT3</th>
										<th>MID</th>
										<th>SMT</th>
										<th>RNUH</th>
										<th>RNT</th>
										<th>NH</th>
										<th>NAR</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($get_siswa as $data) { 
										
										?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $data->nis; ?></td>
										<td><?php echo $data->nama; ?></td>
										<td><?php echo $data->nuh1; ?></td>
										<td><?php echo $data->nuh2; ?></td>
										<td><?php echo $data->nuh3; ?></td>
										<td><?php echo $data->nt1; ?></td>
										<td><?php echo $data->nt2; ?></td>
										<td><?php echo $data->nt3; ?></td>
										<td><?php echo $data->mid; ?></td>
										<td><?php echo $data->smt; ?></td>
										<td><?php echo $data->rnuh; ?></td>
										<td><?php echo $data->rnt; ?></td>
										<td><?php echo $data->nh; ?></td>
										<td><?php echo $data->nar; ?></td>
										<td>
											<a href="<?php echo base_url('datanilai/print_n_m/'.$data->id) ?>" class="btn btn-success btn-xs" title="Cetak" target="_blank"><i class="glyphicon glyphicon-print"></i></a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>						
		    		</div>
		    </div>
		</div>
	</div>
</section>