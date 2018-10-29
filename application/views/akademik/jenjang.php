<section class="content-header">
  <h1>
    Jenjang 
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Jenjang</li>
  </ol>
</section>

    <!-- Main content -->
<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
              		<h3 class="box-title">Data Jenjang</h3>
              		<div class="pull-right">
              			<!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
              			<button type="button" class="btn btn-success btn-sm" onclick="paket()"><i class="fa fa-sitemap"></i> Paket Jenjang</button>
                    <button type="button" class="btn btn-success btn-sm" onclick="add_jenjang()"><i class="fa fa-plus"></i> Tambah</button>
              		</div>
            	</div>
            <!-- /.box-header -->
            	<div class="box-body">
            		<table class="table table-bordered table-hover" id="example1">
            			<thead>
            				<tr class="active">
            					<th width="1%">No</th>
            					<th>Kode_Jenjang</th>
            					<th>Nama</th>
            					<th>Keterangan</th>
            					<th>Aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php 
            				$no =1 ;
            				foreach ($get as $data) { ?>
            				<tr>
            					<td><?php echo $no++; ?></td>
            					<td><?php echo $data->kd_jenjang; ?></td>
            					<td><?php echo $data->nama_jenjang; ?></td>
            					<td><?php echo $data->keterangan; ?></td>
            					<td>
            						<button type="button" class="btn btn-primary btn-sm" onclick="edit_jenjang('<?php echo $data->id_jenjang ?>')"><i class="fa fa-edit"></i> Edit</button>
            						<a href="<?php echo base_url('jenjang/hapus/'.$data->id_jenjang) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h3 class="modal-title">Form Input Jenjang</h3>
      		</div>
      		<div class="modal-body form">
        		<form action="#" id="form" class="form-horizontal">
          			<div class="form-body">
            			<div class="form-group">
              				<label class="control-label col-md-3">Kode Jenjang</label>
              				<div class="col-md-9">
                				<input name="kd_jenjang" id="kd" placeholder="Kode Jenjang" class="form-control" type="text" required="">
              				</div>
            			</div>
            			<div class="form-group">
              				<label class="control-label col-md-3">Nama</label>
          					<div class="col-md-9">
                				<input name="nama_jenjang" placeholder="Nama Jenjang" class="form-control" type="text" required="">
              				</div>
            			</div>
            			<div class="form-group">
              				<label class="control-label col-md-3">Keterangan</label>
              				<div class="col-md-9">
								<input name="keterangan" placeholder="Keterangan" class="form-control" type="text">
              				</div>
            			</div>						
          			</div>
        		</form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  <div class="modal fade" id="paket_modal" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Paket Jenjang & Kelas</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="paket_form" class="form-horizontal">
                <div class="form-body">
                  <div class="form-group">
                      <label class="control-label col-md-3">Paket Jenjang</label>
                      <div class="col-md-9">
                        <select name="pkt" class="form-control" style="width: 100%;">
                          <?php foreach ($paket as $dpaket) { ?>
                          <option value="<?php echo $dpaket->id_paket ?>"><?php echo $dpaket->kode_paket ?></option>
                          <?php } ?>
                        </select>
                      </div>
                  </div>                              
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="savepaket()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>    
    <script>
    var save_method; //for save method string
    var table;
    var gid;
    function paket() {
      $('#paket_form')[0].reset(); 
      $('#paket_modal').modal('show');
    }

    function add_jenjang(){
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal          
    }

    function edit_jenjang(id){
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/jenjang/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            $('[name="kd_jenjang"]').val(data.kd_jenjang);
            $('[name="nama_jenjang"]').val(data.nama_jenjang);
            $('[name="keterangan"]').val(data.keterangan);            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Jenjang'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    function save(){
      var url;      
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/jenjang/simpan')?>";         	
      }else{      	  
          url = "<?php echo site_url('index.php/jenjang/edit/')?>" + gid;        	
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
    function savepaket(){
    var url;            
    url = "<?php echo site_url('index.php/jenjang/simpanpaket')?>";          
             
          $.ajax({
            url : url,
            type: "POST",
            data: $('#paket_form').serialize(),
            dataType: "JSON",
            success: function(data)
            {               
              $('#paket_modal').modal('hide');
              location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data');
            }
        });
    }

   

    </script>