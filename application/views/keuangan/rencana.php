<section class="content-header">
  <h1>
    Rencana Anggaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Rencana Anggaran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
          <div class="box">              
            <!-- /.box-header -->            
        	<div class="box-body">
              	<div class="row">
              		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              			<h4>Pilih Rencana Anggaran</h4>
              		</div>
              		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              			<select name="" class="form-control" onchange="window.location=this.options[this.selectedIndex].value">
                      <option value="">Pilih</option>
                    <?php foreach ($get as $key) { ?>
                      <option value="<?php echo base_url('rencana/get_rencana/').$key->id ?>"><?php echo $key->nm_anggaran ?></option>             
                    <?php } ?>                      
                    </select>                                       
              		</div>
              		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center">
              			<span>Atau&nbsp;</span>
              		</div>
              		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              			<button class="btn btn-success" onclick="add_rencana()"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
              		</div>
              	</div>
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php if (!empty($page)) {
                      $this->load->view($page);
                    } ?>
                  </div>
                </div>
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
            <h3 class="modal-title">Form Input Rencana Anggaran</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <div class="form-body">
                   <div class="form-group">
                      <label class="control-label col-md-3">Nama Anggaran</label>
                    <div class="col-md-9">
                        <input name="nm_anggaran" placeholder="Nama Anggaran" class="form-control" type="text">
                      </div>
                  </div>
                  <div class="form-group">
	                <label class="control-label col-md-3">Periode</label>
                    <div class="col-md-9">
                        <input name="periode" placeholder="Periode" class="form-control" type="text" id="kampret2">
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
    function add_rencana()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal

    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function save(){
      var url;
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/rencana/simpan')?>";
      }else{
          url = "<?php echo site_url('index.php/rencana/edit/')?>" + gid;
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

    function tampil_data(id){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url()?>rencana/get_rencana/' + id,
            async : false,
            dataType : 'json',
            success : function(data){
              $('#show').text(data.nm_rencana);
            }              
        });
    }
</script>