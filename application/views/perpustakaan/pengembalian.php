<section class="content-header">
  <h1>
    Transaksi Pengembalian Buku  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Transaksi Pengembalian Buku</li>
  </ol>
</section>

<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box box-success">
            	<div class="box-header">
              		<h3 class="box-title">Pengembalian Buku</h3>              		
            	</div>
            	<div class="box-body">
            		<?php echo form_open('pengembalian/kembali', array('class' => 'form-inline')); ?>         		
            			<div class="form-group">            				
            				<span style="font-size: 17px; font-weight: bold;">No. Anggota</span>&nbsp; <input type="text" class="form-control" placeholder="Nomor Anggota" name="no" size="40">
            			</div>            		
            			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
            		<?php echo form_close(); ?>
            		<br>
            		<?php if (!empty($r1 && $r2)): ?>            			
            		<div class="row">
            			<div class="col-md-3 col-lg-3">
    						<?php foreach ($r1 as $d1) { ?>
            			<?php echo form_open('pengembalian/checkout'); ?>
                          <div class="form-group">
                            <label>No Peminjaman : </label>
                            <span><?php echo $d1->no_peminjaman ?></span>  
                            <input type="hidden" name="no" value="<?php echo $d1->no_peminjaman ?>">                          
                          </div>
                          <div class="form-group">
                            <label>Nama / Rombel : </label>
                            <span><?php echo $d1->nama." / ".$d1->nama_rombel ?></span>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Pinjam : </label>
                            <span><?php echo $d1->tanggal_pinjam ?></span>
                            <input type="hidden" name="tglp" value="<?php echo $d1->tanggal_pinjam ?>">
                          </div>
                          <div class="form-group">
                            <label>Tanggal Kembali : </label>
                            <span><?php echo $d1->tanggal_kembali ?></span>
                          </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-9 col-lg-9">
                            <table class="table table-hover table-bordered" id="tabel1">
                                <thead>
                                    <tr class="info">
                                        <th width="1%"><input type="checkbox" id="call"></th>   
                                        <th width="10%">ID_Buku</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Pengarang</th>
                                        <th>Rak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                               
                                        $no= 1;
                                        foreach ($r2 as $data) { ?>                                        
                                    <tr>
                                        <td><input type="checkbox" class="cb" name="cb[<?php echo $data->id_detailbuku ?>]"></td>
                                        <td><?php echo $data->id_detailbuku ?></td>
                                        <td><?php echo $data->judul ?></td>
                                        <td><?php echo $data->nama_kategori ?></td>
                                        <td><?php echo $data->pengarang ?></td>
                                        <td><?php echo $data->nama_rak ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary" disabled="disabled" id="chkout" onclick="return confirm('Yakin Checkout Peminjaman ?')"><span class="glyphicon glyphicon-shopping-cart"></span> Checkout</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-sm-3 col-md-3"></div>
                        <div class="col-sm-6 col-md-6">
                           <?php echo $this->session->flashdata('sukses'); ?>
                        </div>
                        <div class="col-sm-3 col-md-3"></div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

