<section class="content-header">
  <h1>
    Kelas  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Kelas</li>
  </ol>
</section>

    <!-- Main content -->
<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
              		<h3 class="box-title">Data Kelas</h3>
              		<div class="pull-right">
              			<!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
              			<button type="button" class="btn btn-success btn-sm" onclick="add_kelas()"><i class="fa fa-plus"></i> Tambah</button>
              		</div>
            	</div>
            <!-- /.box-header -->
            	<div class="box-body">
            		<table class="table table-bordered table-hover" id="example1">
            			<thead>
            				<tr class="active">
            					<th width="1%">No</th>            					
                      <th>Nama Kelas</th>
            					<th>Jenjang</th>                      
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
            					<td><?php echo $data->nama_kelas; ?></td>
                      <td><?php echo $data->nama_jenjang; ?></td>
            					<td><?php echo $data->keterangan; ?></td>
            					<td>
            						<button type="button" class="btn btn-primary btn-sm" onclick="edit_kelas('<?php echo $data->id_kelas ?>')"><i class="fa fa-edit"></i> Edit</button>
            						<a href="<?php echo base_url('kelas/hapus/'.$data->id_kelas) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i> Hapus</a>
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
        		<h3 class="modal-title">Form Input Kelas</h3>
      		</div>
      		<div class="modal-body form">
        		<form action="#" id="form" class="form-horizontal">
          			<div class="form-body">
            			<div class="form-group">
              				<label class="control-label col-md-3">Nama Kelas</label>
              				<div class="col-md-9">
                				<input name="nama_kelas" id="kd" placeholder="Kode Kelas" class="form-control" type="text" required="">
              				</div>
            			</div>
            			<div class="form-group">
              				<label class="control-label col-md-3">Nama Jenjang</label>
          					<div class="col-md-9">
                				<select class="form-control" style="width: 100%;" name="id_jenjang">
                          <?php foreach ($get2 as $data2) { ?>
                          <option value="<?php echo $data2->id_jenjang ?>"><?php echo $data2->kd_jenjang." (".$data2->nama_jenjang.")"; ?></option>
                          <?php } ?>                          
                        </select>
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
    <script>
    var save_method; //for save method string
    var table;
    var gid;
    function add_kelas(){
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); 
    }

    function edit_kelas(id){
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); 
      $.ajax({
        url : "<?php echo site_url('index.php/kelas/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            $('[name="nama_kelas"]').val(data.nama_kelas);
            $('[name="id_jenjang"]').val(data.id_jenjang);
            $('[name="keterangan"]').val(data.keterangan);            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kelas'); // Set title to Bootstrap modal title
            $('[name="id_jenjang"]').trigger('change')

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
          url = "<?php echo site_url('index.php/kelas/simpan')?>";         	
      }else{      	  
          url = "<?php echo site_url('index.php/kelas/edit/')?>" + gid;        	
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

    </script>