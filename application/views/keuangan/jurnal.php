<section class="content-header">
  <h1>
    Jurnal Penyesuaian
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Jurnal Penyesuaian</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                	<h3 class="box-title">Input Jurnal</h3> 
                	<div class="pull-right">
                		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add">Lihat Data</button>         	
        	        </div>                       	
              </div>
            <!-- /.box-header -->
              <div class="box-body">
              		<div class="row">
              			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
              			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              				<?php echo form_open('jurnal/simpan', array('class' => 'form-horizontal')); ?>         	
				          		<div class="form-group">
					    			<label class="control-label col-md-3">Uraian</label>
					    			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					    				<input type="text" class="form-control" name="uraian" placeholder="Uraian" required="">				
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
										  <input type="text" class="form-control" placeholder="Nominal" name="nominal" required="">			
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
              			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
              		</div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.box -->    
</section>

<div class="modal fade bs-example-modal-lg" id="modal_add" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Data Jurnal</h3>
          </div>
          <div class="modal-body form">
  				<table class="table table-bordered" id="example">
					   	<thead>
	                   	<tr class="active">
		                    <th width="1%">No</th>
		                    <th>Tanggal</th>
		                    <th>Uraian</th>
		                    <th>Pencatat</th>
		                    <th>Akun</th>
		                    <th>Debet</th>
		                    <th>Kredit</th>
	                	    <th>Aksi</th>
	                   	</tr>
                	</thead>
  					<tbody>
              <?php $no = 1;
              foreach ($jurnal as $data): ?>                
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data->waktu; ?></td>
                  <td><?php echo $data->uraian; ?></td>
                  <td><?php echo $data->pencatat; ?></td>
                  <td><?php echo $data->nama_akun; ?></td>
                  <td><?php echo "Rp. ".number_format($data->debet); ?></td>
                  <td><?php echo "Rp. ".number_format($data->kredit); ?></td>                  
                  <td>
                    <a href="<?php echo base_url('jurnal/hapus/'.$data->id) ?>" class='btn btn-danger btn-sm' onclick='return confirm(Hapus Data)'><span class='glyphicon glyphicon-trash'></span></a>
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

    function lihat(){
       $.ajax({
        url : "<?php echo site_url('index.php/jurnal/show')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){

          var bilangan = data[i].debet;
					var	number_string = bilangan.toString(),
					sisa 	= number_string.length % 3,
					rupiah 	= number_string.substr(0, sisa),
					ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
						
					if (ribuan) {
						separator = sisa ? '.' : '';
						rupiah += separator + ribuan.join('.');
					}

					var bilangan2 = data[i].kredit;
					var	number_string2 = bilangan2.toString(),
					sisa2 	= number_string2.length % 3,
					rupiah2 	= number_string2.substr(0, sisa2),
					ribuan2 	= number_string2.substr(sisa2).match(/\d{3}/g);
						
					if (ribuan2) {
						separator2 = sisa2 ? '.' : '';
						rupiah2 += separator2 + ribuan2.join('.');
					}
                    html += "<tr>"+
                  "<td>"+ no +"</td>"+
                  "<td>"+data[i].waktu+"</td>"+
                  "<td>"+data[i].uraian+"</td>"+
                  "<td>"+data[i].pencatat+"</td>"+
                  "<td>"+data[i].nama_akun+"</td>"+
                  "<td>Rp. "+rupiah+",00</td>"+
                  "<td>Rp. "+rupiah2+",00</td>"+
                  "<td><a href='jurnal/hapus/"+data[i].id+"' class='btn btn-danger btn-sm' onclick='return confirm(Hapus Data)'><span class='glyphicon glyphicon-trash'></span></a></td>"+                  
                  "</tr>";
                  no++;
                }                            
                $('#show').html(html);           
            	$('#modal_add').modal('show');                         
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
      
    }
    
</script>