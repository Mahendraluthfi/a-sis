<section class="content-header">
  <h1>
    Input Dana Masuk/Keluar
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Input Dana Masuk/Keluar</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                	<h3 class="box-title">Pencatatan Dana Masuk Keluar</h3>         
                	<div class="pull-right">
                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_detail">Lihat Data</button>         	
        	        </div>         
              </div>
            <!-- /.box-header -->
              <div class="box-body">
              		<div class="row">
              			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
              				<div class="panel panel-info">
							  <div class="panel-heading">
							    <h3 class="panel-title">Daftar Jenis Dana Masuk</h3>
							  </div>
							  <div class="panel-body">
							    <div class="list-group">									  
							    <?php foreach ($masuk as $lmasuk) { ?>							    	
									<button onclick="show('<?php echo $lmasuk->id ?>')" class="btn btn-default list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $lmasuk->nm_jenis_trans ?></button>
								<?php } ?>								  
								</div>
							  </div>
							</div>
							<div class="panel panel-info">
							  <div class="panel-heading">
							    <h3 class="panel-title">Daftar Jenis Dana Keluar</h3>
							  </div>
							  <div class="panel-body">
							    <div class="list-group">	
								<?php foreach ($keluar as $lkeluar) { ?>							    	
									<button onclick="show('<?php echo $lkeluar->id ?>')" class="btn btn-default list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $lkeluar->nm_jenis_trans ?></button>
								<?php } ?>								  
								</div>
							  </div>
							</div>
              			</div>
              			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          					<div class="panel panel-success" id="det" style="display: none;">
          						<div class="panel-heading">
          							<h3 class="panel-title">Detail Jenis Transaksi</h3>
          						</div>
          						<div class="panel-body">
          							<form action="" method="POST" class="form-horizontal" role="form">          					
      									<div class="form-group">
      										<label class="control-label col-md-4">Jenis Transaksi</label>
      										<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      											<p class="form-control-static" id="jns"></p>
      										</div>
      									</div>
      									<div class="form-group">
      										<label class="control-label col-md-4">Jumlah Dana Dianggarkan</label>
      										<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      											<p class="form-control-static" id="nominal"></p>
      										</div>
      									</div>
      									<div class="form-group">
      										<label class="control-label col-md-4">Keterangan</label>
      										<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
      											<p class="form-control-static" id="ket"></p>
      										</div>
      									</div>
          							</form>
          						</div>
          					</div>
          					<div class="panel panel-success">
							  <div class="panel-heading">
							    <h3 class="panel-title">Input Dana</h3>
							  </div>
							  <div class="panel-body">
							    <div class="row">
							    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									    <?php echo form_open('inputdana/simpan', array('class' => 'form-horizontal', 'id' => 'form')); ?>	
								    		<div class="form-group">
								    			<label class="control-label col-md-3">Uraian</label>
								    			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
								    				<input type="text" class="form-control" name="uraian" placeholder="Uraian" required="">
								    				<input type="hidden" name="idjns">
								    			</div>
								    		</div>
								    		<div class="form-group">
						                      <label class="control-label col-md-3">Akun Debet</label>
						                      <div class="col-md-9">                      
						                        <select name="debet" class="form-control" style="width: 100%" required="">
						                          <option value="">Pilih</option>                        	
						                          <?php foreach ($akun as $key) { ?>
						                              <option value="<?php echo $key->id_akun ?>"><?php echo $key->nama_akun ?></option>
						                          <?php } ?>
						                        </select>
						                      </div>                    
						                  </div>
						                  <div class="form-group">
						                      <label class="control-label col-md-3">Akun Kredit</label>
						                      <div class="col-md-9">
						                        <select name="kredit" class="form-control" style="width: 100%" required="">
						                        	<option value="">Pilih</option>                        	
						                          <?php foreach ($akun as $key1) { ?>
						                              <option value="<?php echo $key1->id_akun ?>"><?php echo $key1->nama_akun ?></option>
						                          <?php } ?>
						                        </select>
						                      </div>                    
						                  </div>
						                   <div class="form-group">
						                      <label class="control-label col-md-3">Nominal</label>
						                      <div class="col-md-9">
						                      		<div class="input-group">
			            							  <span class="input-group-addon">Rp</span>
			            							  <input type="text" class="form-control" placeholder="Nominal" name="nominal">			            							  
			            							</div>
						                      </div>                    
						                  </div>
								    		<div class="form-group">							    	
					    						<div class="col-sm-offset-3 col-sm-9">
					    							<button type="submit" class="btn btn-primary">Simpan</button>					
					    						</div>
								    		</div>
							    		</form>
							    	</div>
							    </div>
							  </div>							 
							</div>
              			</div>
              		</div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.box -->    
</section>

<div class="modal fade bs-example-modal-lg" id="modal_detail" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Data Transaksi</h3>
          </div>
          <div class="modal-body form">
              <table class="table table-bordered table-hover" id="example">
                 <thead>
                   <tr class="active">
                     <th>No</th>
                     <th>Tanggal</th>
                     <th>Uraian</th>
                     <th>Pencatat</th>
                     <th>Akun</th>
                     <th>Debet</th>
                     <th>Kredit</th>
                     <th>Aksi</th>
                   </tr>
                 </thead>
                 <tbody id="show">
                    <?php $no = 1;
                      foreach ($show as $data): ?>                
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data->waktu; ?></td>
                          <td><?php echo $data->uraian; ?></td>
                          <td><?php echo $data->pencatat; ?></td>
                          <td><?php echo $data->nama_akun; ?></td>
                          <td><?php echo "Rp. ".number_format($data->debet); ?></td>
                          <td><?php echo "Rp. ".number_format($data->kredit); ?></td>                  
                          <td>
                            <a href="<?php echo base_url('inputdana/hapus/'.$data->id) ?>" class='btn btn-danger btn-sm' onclick='return confirm(Hapus Data)'><span class='glyphicon glyphicon-trash'></span></a>
                          </td>                  
                        </tr>
                      <?php endforeach ?>
                 </tbody>
              </table>           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
	var gid;
	function show(zid) {
    	gid = zid;
	  	$('#form')[0].reset();
      	$.ajax({
        url : "<?php echo site_url('index.php/inputdana/get_t')?>/" + gid,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        	{
        		var bilangan = data.nominal;
				var	number_string = bilangan.toString(),
					sisa 	= number_string.length % 3,
					rupiah 	= number_string.substr(0, sisa),
					ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
						
				if (ribuan) {
					separator = sisa ? '.' : '';
					rupiah += separator + ribuan.join('.');
				}
		        $('[name="uraian"]').val(data.nm_jenis_trans);          
		        $('[name="idjns"]').val(data.id);          
		        $('[name="debet"]').val(data.debit);
	          	$('[name="kredit"]').val(data.kredit);
	          	$('#jns').text(data.nm_jenis_trans);         	
	          	$('#nominal').text('Rp. ' + rupiah);
	          	$('#ket').text(data.keterangan);         		          	         
	          	$('#det').show();         		          	         	          	
	         	$('[name="debet"]').trigger('change');
          		$('[name="kredit"]').trigger('change');
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
	   // $('[name="nm_jenis_trans"]').val('tes');
	}
	
</script>