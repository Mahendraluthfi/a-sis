<section class="content-header">
  <h1>
    Pencarian Data Tabungan
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('tabungan') ?>">Tabungan</a></li>
    <li class="active">Data Tabungan</li>    
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- <div class="box-header"></div>             -->
                <div class="box-body">                	
                	<div class="row">
                		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                			<div class="panel panel-primary">
                				<div class="panel-heading">
                					<h3 class="panel-title"><a href="<?php echo base_url('tabungan/view') ?>"><span class="glyphicon glyphicon-refresh"></span></a> Data Siswa</h3>
                				</div>
                				<div class="panel-body">
                					<?php foreach ($siswa as $data) { ?>
                						<h4><?php echo $data->nis ?></h4>
                						<h3><?php echo $data->nama ?><br>
                							<small><?php echo $data->nama_rombel ?></small>
                						</h3>
                						<hr>
                						Saldo
                						<div class="pull-right text-right" style="font-size: 20px; font-weight: bold;"><?php echo "Rp. ".number_format($data->saldo_tabungan); ?></div>
                					<?php  } ?>
                				</div>
                			</div>
                			<div class="panel panel-default">
                				<div class="panel-body">
                					Queue 
                					<div class="pull-right">
                						<a href="<?php echo base_url('tabungan/cetak/'.$this->uri->segment(3)) ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-print"></span></a>	
                					</div><br>
                					<table class="table table-condensed">                						
                						<tbody>
                							<?php foreach ($queue as $dque) {?>
                							<tr>
                								<td><?php echo $dque->date ?></td>
						                    	<td><?php echo number_format($dque->debit); ?></td>
						                      	<td><?php echo number_format($dque->kredit); ?></td>
						                      	<td><?php echo number_format($dque->saldo_r); ?></td>		            
						                  	</tr>
                							<?php } ?>
                						</tbody>
                					</table>
                				</div>
                			</div>
                		</div>
                		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                			<div class="panel panel-primary">
                				<div class="panel-heading">
                					<h3 class="panel-title">Riwayat Tabungan</h3>
                				</div>
                				<div class="panel-body">
                					<table class="table table-bordered table-hover" id="tabungan">
                						<thead>
                					  		<tr class="active">                      
						                      <th>No_TF</th>
						                      <th>Date</th>						                    
						                      <th>Debit</th>
						                      <th>Kredit</th>
						                      <th>Saldo</th>
						                      <th>Ket</th>
						                    </tr>
                						</thead>
                						<tbody>
                							<?php						                    
						                    foreach ($riwayat as $data2) { ?>
						                    <tr>                      
						                      <td><?php echo $data2->id_tf; ?></td>
						                      <td><?php echo $data2->date; ?></td>
						                      <td><?php echo number_format($data2->debit); ?></td>
						                      <td><?php echo number_format($data2->kredit); ?></td>
						                      <td><?php echo number_format($data2->saldo_r); ?></td>                      
						                      <td><?php echo $data2->ket; ?></td>
						                    </tr>
						                    <?php } ?>
                						</tbody>
                					</table>
                				</div>
                			</div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</section>