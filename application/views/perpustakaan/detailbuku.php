<section class="content-header">
  <h1>
    Detail Index Data Buku  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('buku') ?>">Data Buku</a></li>
    <li class="active">Detail Data Buku</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
            		<?php echo form_open('buku/tambah', array('class' => 'form-horizontal'));            			           	
						foreach ($buku as $data) { ?>
						<div class="form-group">
							<label class="control-label col-md-2">ID Buku</label>		
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<p class="form-control-static"><?php echo $data->id_buku ?></p>
								<input type="hidden" name="idbuku" value="<?php echo $data->id_buku ?>">
							</div>
							<label class="control-label col-md-2">Penerbit</label>		
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<p class="form-control-static"><?php echo $data->penerbit ?></p>
							</div>
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<input type="number" name="jml" class="form-control" min="1" placeholder="Tambah Jumlah Buku">		
							</div>
        				</div>            				
        				<div class="form-group">
							<label class="control-label col-md-2">Judul Buku</label>		
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<p class="form-control-static"><?php echo $data->judul ?></p>
							</div>
							<label class="control-label col-md-2">Tahun</label>		
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<p class="form-control-static"><?php echo $data->tahun_terbit ?></p>
							</div>
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
							</div>
        				</div>     
        				<div class="form-group">
							<label class="control-label col-md-2">Kategori</label>		
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<p class="form-control-static"><?php echo $data->nama_kategori ?></p>
							</div>
							<label class="control-label col-md-2">Rak</label>		
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<p class="form-control-static"><?php echo $data->nama_rak ?></p>
							</div>
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<a href="<?php echo base_url('buku/cetakbarcode/'.$data->id_buku.'/') ?>" class="btn btn-success" target="_new"><span class="glyphicon glyphicon-barcode"></span>&nbsp;Cetak Barcode</a>
							</div>
        				</div>     
        				<div class="form-group">
							<label class="control-label col-md-2">Pengarang</label>		
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<p class="form-control-static"><?php echo $data->pengarang ?></p>
							</div>
							<label class="control-label col-md-2">Jumlah</label>		
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<p class="form-control-static"><?php echo $data->jml_buku ?></p>
							</div>
        				</div>     
        				<?php } 
            		echo form_close(); ?>
            	</div>            
            	<div class="box-body">
            		<div class="row">
            			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">            				
		            		<table class="table table-bordered table-hover">
		            			<thead>
		            				<tr class="active">
		            					<th>No</th>
		            					<th>ID_DetailBuku</th>
		            					<th>Barcode</th>
		            					<th>Status</th>		            					
		            					<th>Aksi</th>            					
		            				</tr>
		            			</thead>
		            			<tbody>
		            				<?php $no=1; 
		            				foreach ($detail as $key): ?>            					
		            				<tr>
		            					<td><?php echo $no++; ?></td>
		            					<td><?php echo $key->id_detailbuku ?></td>
		            					<td><img src="<?php echo site_url()?>buku/barcode/<?php echo $key->id_detailbuku;?>" height="50"></td>
		            					<td><?php echo $key->status ?></td>
		            					<td>
		            						<a href="<?php echo base_url('buku/hapusdetail/'.$key->id_detailbuku.'/'.$key->id_buku) ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Hapus Buku ?')"><span class="glyphicon glyphicon-trash"></span></a>
		            						<a href="<?php echo base_url('buku/cetakbarcode/'.$key->id_buku.'/'.$key->id_detailbuku) ?>" class="btn btn-success btn-sm" title="Cetak Barcode" target="_new"><span class="glyphicon glyphicon-barcode"></span></a>		            						
		            					</td>
		            				</tr>
		            				<?php endforeach ?>
		            			</tbody>
		            		</table>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
