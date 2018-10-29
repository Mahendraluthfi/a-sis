<section class="content-header">
  <h1>
    Data Buku  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Data Buku</li>
  </ol>
</section>

    <!-- Main content -->
<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
              		<h3 class="box-title">Data Buku</h3>
              		<div class="pull-right">
              			<!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
              			<button type="button" class="btn btn-success btn-sm" onclick="add_buku()"><i class="fa fa-plus"></i> Tambah</button>
              		</div>
            	</div>
            <!-- /.box-header -->
            	<div class="box-body">
            		<table class="table table-bordered table-hover" id="example1">
            			<thead>
            				<tr class="active">            					
                      <th>ID_Buku</th>
                      <th>Judul</th>
            					<th>Kategori</th>                      
            					<th>Pengarang</th>
                      <th>Penerbit</th>
                      <th width="1%">Tahun</th>
                      <th width="1%">Jml</th>                      
                      <th>Rak</th>                      
            					<th>Aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php 
            				$no =1 ;
            				foreach ($get as $data) { ?>
            				<tr>
            					<td><?php echo $data->id_buku; ?></td>
            					<td><?php echo $data->judul; ?></td>
                      <td><?php echo $data->nama_kategori; ?></td>
                      <td><?php echo $data->pengarang; ?></td>
                      <td><?php echo $data->penerbit; ?></td>
                      <td><?php echo $data->tahun_terbit; ?></td>
                      <td><?php echo $data->jml_buku; ?></td>                    
            					<td><?php echo $data->nama_rak; ?></td>
            					<td>
                        <a href="<?php echo base_url('buku/detailbuku/'.$data->id_buku) ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-zoom-in"></span></a>
            						<button type="button" class="btn btn-primary btn-sm" onclick="edit_buku('<?php echo $data->id_buku ?>')"><i class="fa fa-edit"></i></button>
            						<a href="<?php echo base_url('buku/hapus/'.$data->id_buku) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i></a>
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
        		<h3 class="modal-title">Form Input Data Buku</h3>
      		</div>
      		<div class="modal-body form">
        		<form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
          			<div class="form-body">
            			<div class="form-group">
              				<label class="control-label col-md-3">Judul Buku</label>
              				<div class="col-md-9">
                				<input name="judul" id="kd" placeholder="Judul Buku" class="form-control" type="text" required="">
              				</div>
            			</div>
            			<div class="form-group">
              				<label class="control-label col-md-3">Kategori</label>
                    <div class="col-md-9">
                        <select class="form-control" style="width: 100%;" name="kategori">
                          <?php foreach ($get2 as $data2) { ?>
                          <option value="<?php echo $data2->id_kategori ?>"><?php echo $data2->nama_kategori; ?></option>
                          <?php } ?>                          
                        </select>
              				</div>
            			</div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Rak Buku</label>
                    <div class="col-md-9">
                        <select class="form-control" style="width: 100%;" name="rak">
                          <?php foreach ($get3 as $data3) { ?>
                          <option value="<?php echo $data3->id_rak ?>"><?php echo $data3->nama_rak; ?></option>
                          <?php } ?>                          
                        </select>
                      </div>
                  </div>
            			<div class="form-group">
              				<label class="control-label col-md-3">Pengarang</label>
              				<div class="col-md-9">
								          <input name="pengarang" placeholder="Pengarang Buku" class="form-control" type="text">
              				</div>
            			</div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Penerbit</label>
                      <div class="col-md-9">
                          <input name="penerbit" placeholder="Penerbit Buku" class="form-control" type="text">
                      </div>
                  </div>            
                  <div class="form-group">
                      <label class="control-label col-md-3">Tahun Terbit</label>
                      <div class="col-md-9">
                          <input name="tahun_terbit" placeholder="Tahun Terbit Buku" class="form-control" type="text">
                      </div>
                  </div>            
                  <div class="form-group">
                      <label class="control-label col-md-3">Jml Buku</label>
                      <div class="col-md-9">
                          <input name="jml" placeholder="Jumlah Buku" class="form-control" type="number" min="1">
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
    function add_buku(){
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('[name="jml"]').removeAttr('disabled','disabled');            
      $('#modal_form').modal('show'); 
    }

    function edit_buku(id){
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); 
      $.ajax({
        url : "<?php echo site_url('index.php/buku/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            $('[name="judul"]').val(data.judul);
            $('[name="kategori"]').val(data.id_kategori);
            $('[name="rak"]').val(data.id_rak);
            $('[name="pengarang"]').val(data.pengarang);
            $('[name="penerbit"]').val(data.penerbit);            
            $('[name="tahun_terbit"]').val(data.tahun_terbit);            
            $('[name="jml"]').val(data.jml_buku);            
            $('[name="jml"]').attr('disabled','disabled');            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data Buku'); // Set title to Bootstrap modal title
            $('[name="kategori"]').trigger('change')
            $('[name="rak"]').trigger('change')


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
          url = "<?php echo site_url('index.php/buku/simpan')?>";         	
      }else{      	  
          url = "<?php echo site_url('index.php/buku/edit/')?>" + gid;        	
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