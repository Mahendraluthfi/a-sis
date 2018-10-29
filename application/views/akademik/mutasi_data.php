<section class="content-header">
  <h1>
    Mutasi Siswa 
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('mutasi') ?>">Mutasi Siswa</a></li>
    <li class="active">Data Mutasi</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
  		<div class="col-xs-12">
        	<div class="box box-success">
            	<div class="box-header">
            		<h3 class="box-title"><?php echo $title ?></h3>
            		<div class="pull-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                          Lihat Data 
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li><a href="<?php echo base_url('mutasi/data/'.base64_encode('lulus')) ?>">Lulus</a></li>
                          <li><a href="<?php echo base_url('mutasi/data/'.base64_encode('pindah')) ?>">Pindah</a></li>
                        </ul>
                      </div>
                  </div>  
            	</div>
            	<!-- /.box-header -->
            	<div class="box-body">
            		<div class="row">
            			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            				<table class="table table-bordered" id="example1">
            					<thead>
            						<tr class="active">
            							<th width="1%">No</th>            							
            							<th>Rombel</th>            							
            							<th>NISN</th>
            							<th>Nama Lengkap</th>
            							<th>TTL</th>
            							<th>Jekel</th>
            							<th>Alamat</th>
            							<th><?php echo $td ?></th>
            						</tr>
            					</thead>
            					<tbody>
        						<?php $no = 1;
        						foreach ($row as $key) { ?>
            						<tr>
            							<td><?php echo $no++; ?></td>            							
            							<td><?php echo $key->nama_rombel ?></td>
            							<td><?php echo $key->nisn ?></td>
            							<td><?php echo $key->nama ?></td>
            							<td><?php echo $key->tempat_lahir.' / '.$key->tgl_lahir ?></td>
            							<td><?php echo $key->jekel ?></td>
            							<td><?php echo $key->alamat_tinggal ?></td>       
            							<td><?php echo $key->last ?></td>                   							
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
</section>