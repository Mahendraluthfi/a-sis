<section class="content-header">
  <h1>
    Data Anggota  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Data Anggota</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
              		<h3 class="box-title">Data Anggota Perpustakaan</h3>
              		<div class="pull-right">
              			<a href="<?php echo base_url('anggota/add') ?>" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a>              			
              		</div>
            	</div>            
            	<div class="box-body">
            		<table class="table table-bordered table-hover" id="example">
            			<thead>
            				<tr class="active">
            					<th width="1%">No</th>
            					<th>ID_Anggota</th>
            					<th>Nama</th>
            					<th>NIS</th>
            					<th>Kelas</th>
            					<th>Rombel</th>
            					<th>Tgl Daftar</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php $no=1;
            				foreach ($anggota as $key) { ?>
	            				<tr>
		            				<td><?php echo $no++; ?></td>
	            					<td><?php echo $key->id_anggota ?></td>
	            					<td><?php echo $key->nama ?></td>
	            					<td><?php echo $key->nis ?></td>
	            					<td><?php echo $key->nama_kelas ?></td>
	            					<td><?php echo $key->nama_rombel ?></td>
	            					<td><?php echo $key->tgl_daftar ?></td>
	            					<td>
	            						<a href="<?php echo base_url('anggota/cetakkartu/'.$key->id_anggota) ?>" class="btn btn-success btn-sm" title="Cetak Kartu" target="_new"><span class="fa fa-credit-card"></span></a>
	            						<a href="" class="btn btn-danger btn-sm" title="Hapus Anggota"><span class="glyphicon glyphicon-trash"></span></a>
	            					</td>
	            					
	            				</tr>
            				<?php } ?>
            			</tbody>
            		</table>
            	</div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>