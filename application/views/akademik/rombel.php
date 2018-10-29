<section class="content-header">
  <h1>
    Rombongan Belajar  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Rombongan Belajar</li>
  </ol>
</section>

    <!-- Main content -->
<section class="content">
  	<div class="row">
    	<div class="col-xs-12">
        	<div class="box">
            	<div class="box-header">
              		<h3 class="box-title">Data Rombongan Belajar</h3>
              		<div class="pull-right">
              			<!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->              			
                    <button type="button" class="btn btn-success btn-sm" onclick="add_rombel()"><i class="fa fa-plus"></i> Tambah</button>
              		</div>
            	</div>
            <!-- /.box-header -->
            	<div class="box-body">
            		<table class="table table-bordered table-hover" id="example1">
            			<thead>
            				<tr class="active">
            					<th width="1%">No</th>            					
                      <th>Nama Rombongan Belajar</th>
                      <th>Nama Kelas</th>
                      <th>Nama Jenjang</th>                                                               
                      <th>Kuota</th>                                                                
            					<th>Wali Kelas</th>                                                        				
            					<th>Aksi</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php 
            				$no =1 ;
            				foreach ($get as $data) { ?>
            				<tr>
            					<td><?php echo $no++; ?></td>
            					<td><?php echo $data->nama_rombel; ?></td>
                      <td><?php echo $data->nama_kelas; ?></td>
                      <td><?php echo $data->nama_jenjang; ?></td>
            					<td><?php echo $data->jml." / ".$data->kuota; ?></td>
                      <td><?php echo $data->nama_guru; ?></td>                      
            					<td>
                        <button type="button" class="btn btn-default btn-sm" onclick="detail_rombel('<?php echo $data->id_rombel ?>')"><i class="glyphicon glyphicon-zoom-in"></i> Detail</button>
            						<button type="button" class="btn btn-primary btn-sm" onclick="edit_rombel('<?php echo $data->id_rombel ?>')"><i class="fa fa-edit"></i> Edit</button>
            						<a href="<?php echo base_url('rombel/hapus/'.$data->id_rombel) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal_detail" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Detail Rombongan Belajar</h3>
          </div>
          <div class="modal-body form">
              <table class="table table-bordered table-hover" id="tb">
                 <thead>
                   <tr class="active">
                     <th>NIS</th>
                     <th>Nama</th>
                     <th>Rombel</th>
                   </tr>
                 </thead>
                 <tbody id="show">
               
                 </tbody>
              </table>           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h3 class="modal-title">Form Input Rombel</h3>
      		</div>
      		<div class="modal-body form">
        		<form action="#" id="form" class="form-horizontal">
          			<div class="form-body">
            			<div class="form-group">
              				<label class="control-label col-md-3">Nama Rombel</label>
              				<div class="col-md-9">
                				<input name="nama_rombel" placeholder="Nama Rombongan Belajar" class="form-control" type="text" required="">
              				</div>
            			</div>
            			<div class="form-group">
              				<label class="control-label col-md-3">Nama Kelas</label>
          					  <div class="col-md-9">
                				<select class="form-control" style="width: 100%;" name="id_kelas">
                          <?php foreach ($get2 as $data2) { ?>
                          <option value="<?php echo $data2->id_kelas ?>"><?php echo $data2->nama_jenjang." (".$data2->nama_kelas.")"; ?></option>
                          <?php } ?>
                        </select>
              				</div>
            			</div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Kuota Kelas</label>
                      <div class="col-md-9">
                        <input name="kuota" placeholder="Kuota Kelas" class="form-control" type="text" required="">
                      </div>
                  </div>            							
          			</div>
                <div class="form-group">
                  <label class="control-label col-md-3">Wali Kelas Kelas</label>
                  <div class="col-md-9">
                    <select class="form-control" style="width: 100%;" name="nip">
                      <option value="0">-Pilih-</option>
                      <?php foreach ($get3 as $data3) { ?>
                      <option value="<?php echo $data3->nip ?>"><?php echo $data3->nama_guru; ?></option>
                      <?php } ?>
                    </select>
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

    function detail_rombel(id){
        var a = $('#tb').DataTable();           
        a.clear().draw();
        a.destroy();
        $.ajax({
        url : "<?php echo site_url('index.php/rombel/get_det')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += "<tr>"+
                  "<td>"+data[i].nis+"</td>"+
                  "<td>"+data[i].nama+"</td>"+
                  "<td>"+data[i].nama_rombel+"</td>"+                  
                  "</tr>";
                }
                $('.modal-title').text('Detail Rombongan Kelas'); // Set title to Bootstrap modal title                
                $('#show').html(html);                           
                $('#tb').DataTable();
                $('#modal_detail').modal('show');                         
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
      
    }

    function add_rombel(){
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); 
    }

    function edit_rombel(id){
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); 
      $.ajax({
        url : "<?php echo site_url('index.php/rombel/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
                  
            $('[name="nama_rombel"]').val(data.nama_rombel);
            $('[name="kuota"]').val(data.kuota);
            $('[name="id_kelas"]').val(data.id_kelas);            
            $('[name="nip"]').val(data.nip);            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Rombongan Kelas'); // Set title to Bootstrap modal title
            $('[name="id_kelas"]').trigger('change');
            $('[name="nip"]').trigger('change');
            
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
          url = "<?php echo site_url('index.php/rombel/simpan')?>";         	
      }else{      	  
          url = "<?php echo site_url('index.php/rombel/edit/')?>" + gid;        	
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