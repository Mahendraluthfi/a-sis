<section class="content-header">
  <h1>
    Edit Set Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url('setbayar') ?>"> Set Pembayaran</a></li>
    <li class="active">Edit Set Pembayaran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Data Set Pembayaran</h3>
                  <div class="pull-right">
                    <!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
                    <!-- <button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Pembayaran</button> -->
                  </div>
              </div>
            <!-- /.box-nama -->
              <div class="box-body">
              	<div class="row">
              		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                  <form action="<?php echo base_url('setbayar/simpanedit') ?>" method="POST" class="form-horizontal" role="form">
                        <?php foreach ($set as $key) { ?>
                        <div class="form-group">
                          <label class="control-label col-md-4">Nama</label>
                          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static"><?php echo $key->nama ?></p>
                            <input type="hidden" name="id" value="<?php echo $key->id ?>">
                            <input type="hidden" name="tipe" value="<?php echo $key->tipe ?>">
                          </div>
                        </div>                                              
                        <div class="form-group">
                          <label class="control-label col-md-4">Tagihan</label>
                          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static"><?php echo number_format($key->tagihan) ?></p>                            
                          </div>
                        </div>                         
                        <?php } ?>                     
                        <?php foreach ($pbyr as $key1) { ?>
                        <div class="form-group">
                          <label class="control-label col-md-4">Nama Pilihan Bayar</label>
                          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p class="form-control-static"><?php echo $key1->nama_pilihan ?></p>
                          </div>
                        </div>                                              
                        <div class="form-group">
                          <label class="control-label col-md-4">Opsi</label>
                          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <select name="pilih" class="form-control">
                              <option value="<?php echo $key1->opsi_a ?>"><?php echo number_format($key1->opsi_a) ?></option>
                              <option value="<?php echo $key1->opsi_b ?>"><?php echo number_format($key1->opsi_b) ?></option>
                              <option value="<?php echo $key1->opsi_c ?>"><?php echo number_format($key1->opsi_c) ?></option>
                              <option value="<?php echo $key1->opsi_d ?>"><?php echo number_format($key1->opsi_d) ?></option>
                            </select>
                          </div>
                        </div>                       
                        <?php } ?>                       
                        <div class="form-group">
                          <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin Simpan ?')">Simpan</button>
                          </div>
                        </div>
                    </form>  
                  </div>              		
              	</div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
