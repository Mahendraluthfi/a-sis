<h3><?php foreach ($get_id as $det) {
  echo $det->nm_anggaran; ?> &nbsp;<a href="<?php echo base_url('rencana/hapus_r/'.$det->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus ?')"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;<button class="btn btn-primary btn-xs" onclick="edit('<?php echo $det->id ?>')"><span class="glyphicon glyphicon-pencil"></span></button></h3>
<div class="pull-right">
  <h4>Periode <?php echo date('d M Y', strtotime($det->awal_periode))." / ".date('d M Y', strtotime($det->akhir_periode)) ?></h4>
</div>
<?php } ?>
<div>
	<button type="button" class="btn btn-danger" onclick="pendapatan()"><span class="glyphicon glyphicon-plus"></span> Tambah Pendapatan</button>	
	<button type="button" class="btn btn-danger" onclick="pengeluaran()"><span class="glyphicon glyphicon-plus"></span> Tambah Pengeluaran</button>	
	<a href="<?php echo base_url('rencana/save/'.$this->uri->segment(3)) ?>" class="btn btn-success"  onclick="return confirm('Tetapkan Rencana Anggaran ?')"><span class="glyphicon glyphicon-save"></span> Tetapkan</a>	
</div>
<br>
<table class="table table-bordered table-hover table-striped">
	<tbody>
		<tr><th colspan="5">Pendapatan</th></tr>
		<!-- <tr>
			<th class="col-md-1"></th>
			<th colspan="4">1. Dana BOS</th>
		</tr>		-->
    <?php $no=1; $total=0;
    foreach ($masuk as $datamasuk) { 
      $total = $datamasuk->nominal + $total ;
      ?>
		<tr>
			<th class="col-md-1"></th>
			<th class="col-md-1 text-right"><button type="button" class="btn btn-warning btn-xs" onclick="edit_masuk('<?php echo $datamasuk->id ?>')"><span class="glyphicon glyphicon-pencil"></span></button>&nbsp;<a href="<?php echo base_url('rencana/hapus/'.$datamasuk->id.'/'.$id) ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></th>
			<td class="col-md-5"><?php echo $no++.". ".$datamasuk->nm_jenis_trans; ?></td>
			<td class="col-md-3"><?php echo $datamasuk->keterangan ?></td>
			<td class="col-md-2"><?php echo "Rp. ".number_format($datamasuk->nominal); ?></td>
		</tr>
    <?php } ?>

		<tr><th colspan="4">Total Rencana Pendapatan</th><th><?php echo "Rp. ".number_format($total); ?></th></tr>
		<tr><th colspan="5">Pengeluaran</th></tr>
     <?php $no=1; $total1=0;
    foreach ($keluar as $datakeluar) { 
      $total1 = $datakeluar->nominal + $total1 ;
      ?>
    <tr>
      <th class="col-md-1"></th>
      <th class="col-md-1 text-right"><button type="button" class="btn btn-warning btn-xs" onclick="edit_keluar('<?php echo $datakeluar->id ?>')"><span class="glyphicon glyphicon-pencil"></span></button>&nbsp;<a href="<?php echo base_url('rencana/hapus/'.$datakeluar->id.'/'.$id) ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></th>
      <td class="col-md-5"><?php echo $no++.". ".$datakeluar->nm_jenis_trans; ?></td>
      <td class="col-md-3"><?php echo $datakeluar->keterangan ?></td>
      <td class="col-md-2"><?php echo "Rp. ".number_format($datakeluar->nominal); ?></td>
    </tr>
    <?php } ?>
		<tr><th colspan="4">Total Rencana Pengeluaran</th><th><?php echo "Rp. ".number_format($total1); ?></th></tr>		
	</tbody>
</table>

<div class="modal fade" id="modal_pendapatan" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Pendapatan</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form_pendapatan" class="form-horizontal">
                <div class="form-body">
                   <div class="form-group">
                      <label class="control-label col-md-3">Nama Pendapatan</label>
                      <div class="col-md-9">
                        <input name="nm_jenis_trans" placeholder="Nama Pendapatan" class="form-control" type="text">
                        <input name="idrab" type="hidden" value="<?php echo $id; ?>">
                        <input name="jenis" type="hidden" value="m">
                      </div>                    
                  </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Akun Debet</label>
                      <div class="col-md-9">                      
                        <select name="debit" class="form-control" style="width: 100%">                        	
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
                        <select name="kredit" class="form-control" style="width: 100%">
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
            							  <span class="input-group-addon">.00</span>
            							</div>
                      </div>                    
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Keterangan</label>
                      <div class="col-md-9">
						              <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                      </div>                    
                  </div>
              	</div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_masuk()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<div class="modal fade" id="modal_pengeluaran" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Pengeluaran</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form_pengeluaran" class="form-horizontal">
                <div class="form-body">
                   <div class="form-group">
                      <label class="control-label col-md-3">Nama Pengeluaran</label>
                      <div class="col-md-9">
                        <input name="nm_jenis_trans" placeholder="Nama Pengeluaran" class="form-control" type="text">
                        <input name="idrab" type="hidden" value="<?php echo $id; ?>">
                        <input name="jenis" type="hidden" value="k">
                      </div>                    
                  </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Akun Debet</label>
                      <div class="col-md-9">                      
                        <select name="debit" class="form-control" style="width: 100%">                          
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
                        <select name="kredit" class="form-control" style="width: 100%">
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
                <span class="input-group-addon">.00</span>
              </div>
                      </div>                    
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Keterangan</label>
                      <div class="col-md-9">
              <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                      </div>                    
                  </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_keluar()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Rencana Anggaran</h4>
      </div>
      <div class="modal-body">        
        <?php echo form_open('rencana/edit/'.$this->uri->segment(3), array('class' => 'form-horizontal')); ?>
            <div class="form-group">
              <label class="col-md-3 control-label">Nama Anggaran</label>              
              <div class="col-md-9">
                <input type="text" name="nm_anggaran" class="form-control" placeholder="Nama Anggaran">                
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-9 col-sm-offset-3">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>                
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
        </form>        
      </div>      
    </div>
  </div>
</div>

<script>
  var save_method;
  var url;
	function edit(noid) {
    $.ajax({
      url : "<?php echo site_url('index.php/rencana/idrencana')?>/" + noid,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {          
          $('[name="nm_anggaran"]').val(data.nm_anggaran);
          $('#edit').modal('show'); // show bootstrap modal when complete loaded
          // $('.modal-title').text('Edit Akun'); // Set title to Bootstrap modal title          
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });         
    //$('#edit').modal('show');
  }
  function pendapatan() {    
    save_method = 'add';    
    $('#form_pendapatan')[0].reset(); // reset form on modals
    $('#modal_pendapatan').modal('show');   
  }

   function pengeluaran() {    
    save_method = 'add';    
    $('#form_pengeluaran')[0].reset(); // reset form on modals
    $('#modal_pengeluaran').modal('show');   
  }

  function edit_masuk(id){
    save_method = 'update';
    gid = id;
    $('#form')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo site_url('index.php/rencana/get_trans')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          $('[name="nm_jenis_trans"]').val(data.nm_jenis_trans);          
          $('[name="debit"]').val(data.debit);
          $('[name="kredit"]').val(data.kredit);
          $('[name="nominal"]').val(data.nominal);
          $('[name="keterangan"]').val(data.keterangan);
          $('#modal_pendapatan').modal('show'); // show bootstrap modal when complete loaded
          // $('.modal-title').text('Edit Akun'); // Set title to Bootstrap modal title
          $('[name="debit"]').trigger('change');
          $('[name="kredit"]').trigger('change');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }

   function edit_keluar(id){
    save_method = 'update';
    gid = id;
    $('#form')[0].reset(); // reset form on modals  
    $.ajax({
      url : "<?php echo site_url('index.php/rencana/get_trans')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
          $('[name="nm_jenis_trans"]').val(data.nm_jenis_trans);          
          $('[name="debit"]').val(data.debit);
          $('[name="kredit"]').val(data.kredit);
          $('[name="nominal"]').val(data.nominal);
          $('[name="keterangan"]').val(data.keterangan);
          $('#modal_pendapatan').modal('show'); // show bootstrap modal when complete loaded
          // $('.modal-title').text('Edit Akun'); // Set title to Bootstrap modal title
          $('[name="debit"]').trigger('change');
          $('[name="kredit"]').trigger('change');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }
  function save_masuk() {   
    if(save_method == 'add'){
        url = "<?php echo base_url()?>rencana/s_root/";
    }else{
        url = "<?php echo base_url()?>rencana/s_edit/" + gid;
    }
    $.ajax({
      url : url,
      type: "POST",
      data: $('#form_pendapatan').serialize(),
      dataType: "JSON",
      success: function(data)
      {
         //if success close modal and reload ajax table
        $('#modal_pendapatan').modal('hide');
        location.reload();// for reload a page
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error adding / update data');
      }
    });
  }


  function save_keluar() {   
    if(save_method == 'add'){
        url = "<?php echo base_url()?>rencana/s_root/";
    }else{
        url = "<?php echo base_url()?>rencana/s_edit/" + gid;
    }
    $.ajax({
      url : url,
      type: "POST",
      data: $('#form_pengeluaran').serialize(),
      dataType: "JSON",
      success: function(data)
      {
         //if success close modal and reload ajax table
        $('#modal_pengeluaran').modal('hide');
        location.reload();// for reload a page
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error adding / update data');
      }
    });
  }


</script>