<section class="content-header">
  <h1>
    Input Peminjaman Buku  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('peminjaman') ?>"><span class="glyphicon glyphicon-transfer"></span> Transaksi Peminjaman Buku</a></li>    
    <li class="active">Input Peminjaman Buku</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-danger">            	
            <!-- /.box-header -->
            	<div class="box-body">
            		<div class="row">
            			<div class="col-sm-12 col-md-12">
            				<?php if (!empty($this->session->userdata('sis_siswa'))) { ?>
							<div class="container-fluid">
							<?php echo form_open('peminjaman/search',array('class' => 'form_horizontal', 'id' => 'form')); ?>
								<div class="form-group">
									<legend>No Peminjaman. <?php echo $no; ?> <a href="<?php echo base_url('peminjaman/remove') ?>"><span class="glyphicon glyphicon-remove"></span></a></legend>
								</div>
								<?php foreach ($i_siswa as $key) { ?>
								<div class="form-group">
									<div class="col-md-6">
										<label class="control-label col-md-2">ID Anggota</label>
										<div class="col-md-4">
											<p class="form-control-static"><?php echo $key->id_anggota; ?></p>					
										</div>
										<label class="control-label col-md-2">Nama</label>
										<div class="col-md-4">
											<p class="form-control-static"><?php echo $key->nama; ?></p>
											<input type="hidden" name="no" value="<?php echo $no ?>">
											<input type="hidden" name="ids" value="<?php echo $key->id_anggota ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
										<label class="control-label col-md-2">Kelas/rombel</label>
										<div class="col-md-3">
											<p class="form-control-static"><?php echo $key->nama_rombel; ?></p>					
										</div>
										<div class="col-md-7">
											<div class="input-group">
										      <input type="text" class="form-control" placeholder="Cari Data Buku" name="id">
										      <span class="input-group-btn">
										        <button class="btn btn-default" type="submit">Cari</button>
										      </span>
										    </div>
										</div>
									</div>									
									</div>
								</div>
								<?php } ?>								
							</form>
							</div>
            				<?php }else{ ?>
            				<?php echo form_open('peminjaman/form', array('class' => 'form-inline')); ?>
            					<div class="form-group">
            						<label class="control-label">Cari Anggota</label><span>&nbsp;</span>
            						<input type="text" name="id_anggota" class="form-control" placeholder="ID Anggota">
									<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Cari</button>            					
            					</div>              					
            				</form>
            				<?php } ?>
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            				<div class="container-fluid">
	            				<?php echo $this->session->flashdata('cari'); ?>
	            			</div>
            			</div>
            		</div>
            		<br>
            		<div class="row">
            			<div class="col-sm-12 col-md-12">
            				<div class="container-fluid">
	            				<table class="table table-hover" id="example1">
	            					<thead>
	            						<tr class="active">
	            							<th width="1%">No</th>
	            							<th>ID buku</th>
	            							<th>Judul</th>
	            							<th>Kategori</th>
	            							<th>Pengarang</th>
	            							<th>Rak</th>	            							
	            							<th>Aksi</th>
	            						</tr>
	            					</thead>
	            					<tbody>
	            						<?php 
	            						if (!empty($this->session->userdata('no'))) {	            							
	            							$no= 1;
	            							foreach ($get as $data) { ?>	            						
	            						<tr>
	            							<td><?php echo $no++ ?></td>
	            							<td><?php echo $data->id_detailbuku ?></td>
	            							<td><?php echo $data->judul ?></td>
	            							<td><?php echo $data->nama_kategori ?></td>
	            							<td><?php echo $data->pengarang ?></td>
	            							<td><?php echo $data->nama_rak ?></td>	            							
	            							<td>
	            								<a href="<?php echo base_url('peminjaman/hapus_p/'.$data->id_peminjaman.'/'.$data->id_detailbuku) ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
	            							</td>
	            						</tr>
	            						<?php }} ?>
	            					</tbody>
	            				</table>            					
            				</div>
            			</div>
            		</div><br>
          			<?php if ($this->session->has_userdata('sis_siswa') && $this->session->has_userdata('no')) { ?>  		
            		<div class="row">
            			<div class="col-sm-12 col-md-12">
            				<div class="container-fluid">
            					<?php echo form_open('peminjaman/simpanpinjam', array('class' => 'form-inline')); ?>           	
            						<div class="form-group">
            							<label class="control-label">Tanggal Pinjam</label><span>&nbsp;&nbsp;</span>
	                                    <input class="form-control" name="tgl" type="text" name="tglpinjam" value="<?php echo date('Y-m-d') ?>" id="datepicker" placeholder="<?php echo date('Y-m-d') ?>" />
	                                    <input type="hidden" name="nopmj" value="<?php echo $this->session->userdata('no'); ?>">
	                                    <input type="hidden" name="ids" value="<?php echo $this->session->userdata('sis_siswa'); ?>">
            						</div>            					
            						<button type="submit" onclick="return confirm('Yakin Simpan ?')" class="btn btn-success">Simpan</button>
            					</form>
            				</div>
            			</div>            			
            		</div><p>&nbsp;</p>
            		<?php } ?>
            	</div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
