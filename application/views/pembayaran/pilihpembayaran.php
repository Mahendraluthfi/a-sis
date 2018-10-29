<section class="content-header">
  <h1>
    Pilihan Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Pilihan Pembayaran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">Data Pilihan Pembayaran</h3>
                  <div class="pull-right">
                    <!-- <a href="" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Tambah</a> -->
                    <button type="button" class="btn btn-success btn-sm" onclick="add_pilihan()"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
              </div>
            <!-- /.box-nama -->
              <div class="box-body">
                <table class="table table-bordered table-hover" id="example1">
                  <thead>
                    <tr class="active">
                      <th width="1%">No</th>
                      <th>Nama Pilihan</th>
                      <th>Jenjang</th>
                      <th>Kode Jenis</th>
                      <th>Opsi_a</th>
                      <th>Opsi_b</th>
                      <th>Opsi_c</th>                      
                      <th>Opsi_d</th>                      
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($get as $data) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data->nama_pilihan; ?></td>
                      <td><?php echo $data->nama_kelas; ?></td>
                      <td><?php echo $data->kode_jenis; ?></td>
                      <td><?php echo number_format($data->opsi_a); ?></td>
                      <td><?php echo number_format($data->opsi_b); ?></td>
                      <td><?php echo number_format($data->opsi_c); ?></td>                                      
                      <td><?php echo number_format($data->opsi_d); ?></td>                                      
                      <td>
                        <button type="button" class="btn btn-primary btn-sm" onclick="edit_jm('<?php echo $data->id ?>')"><i class="fa fa-edit"></i> Edit</button>
                        <a href="<?php echo base_url('pilihbayar/hapus/'.$data->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ?')"><i class="fa fa-trash"></i> Hapus</a>
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
            <h3 class="modal-title">Form Input Pilihan Pembayaran</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <div class="form-body">
                   <div class="form-group">
                      <label class="control-label col-md-3">Nama Pilihan</label>
                    	  <div class="col-md-9">
                        	<input name="nama" placeholder="Nama Pilihan" class="form-control" type="text">
                      	</div>
                    </div>                
                  <div class="form-group">
                      <label class="control-label col-md-3">Kelas</label>
                      <div class="col-md-9">
                      <select name="kelas" class="form-control" style="width: 100%;">
                        <option value="">--Pilih--</option>
                        <?php foreach ($kelas as $setkelas) { ?>
                          <option value="<?php echo $setkelas->id_kelas ?>"><?php echo $setkelas->nama_kelas ?></option>
                        <?php } ?>
                      </select>                  
                      </div>
                  </div>
                  <div class="form-group">
                      	<label class="control-label col-md-3">Kode Jenis</label>
                    	<div class="col-md-9">
                        <select name="jenis" class="form-control" style="width: 100%;">
                        <option value="">--Pilih--</option>
                        <?php foreach ($jenis as $setjenis) { ?>
                          <option value="<?php echo $setjenis->id ?>"><?php echo $setjenis->kode_jenis ?></option>
                        <?php } ?>
                      </select>  
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Opsi A</label>
                  	  <div class="col-md-9">
                        <input type="text" name="opsia" class="form-control" placeholder="Masukkan Nominal">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Opsi A</label>
                      <div class="col-md-9">
                        <input type="text" name="opsib" class="form-control" placeholder="Masukkan Nominal">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Opsi C</label>
                      <div class="col-md-9">
                        <input type="text" name="opsic" class="form-control" placeholder="Masukkan Nominal">
                      </div>
                  </div> 
                  <div class="form-group">
                      <label class="control-label col-md-3">Opsi D</label>
                      <div class="col-md-9">
                        <input type="text" name="opsid" class="form-control" placeholder="Masukkan Nominal">
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
    function add_pilihan()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    function edit_jm(idj)
    {
      save_method = 'update';
      gid = idj;
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/pilihbayar/get')?>/" + idj,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="nama"]').val(data.nama_pilihan);
            $('[name="kelas"]').val(data.id_kelas);
            $('[name="jenis"]').val(data.id_jenis);
            $('[name="opsia"]').val(data.opsi_a);
            $('[name="opsib"]').val(data.opsi_b);
            $('[name="opsic"]').val(data.opsi_c);
            $('[name="opsid"]').val(data.opsi_d);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Jenis Pembayaran'); // Set title to Bootstrap modal title
            $('[name="kelas"]').trigger('change');
            $('[name="jenis"]').trigger('change');

        },
        error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
    function save(){       
      var url;
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/pilihbayar/simpan')?>";
      }else{
          url = "<?php echo site_url('index.php/pilihbayar/edit/')?>" + gid;
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
