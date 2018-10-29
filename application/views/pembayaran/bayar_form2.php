<section class="content-header">
  <h1>
    Form Pembayaran  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('inputbayar') ?>">Input Pembayaran</a></li>
    <li class="active">Form Pembayaran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <legend>Data Tagihan</legend>
                </div>            
                <div class="box-body">                  
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <form action="" method="POST" class="form-horizontal" role="form">                            
                            <?php foreach ($row as $data) { ?>
                            <div class="form-group">
                              <label class="control-label col-md-4">Nama</label>
                              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p class="form-control-static"><?php echo $data->nama ?></p>
                              </div>
                              <label class="control-label col-md-4">Rombel</label>
                              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p class="form-control-static"><?php echo $data->nama_rombel ?></p>
                              </div>
                              <label class="control-label col-md-4">Jenis Tagihan</label>
                              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p class="form-control-static"><?php echo $data->nama_pilihan ?></p>
                              </div>
                              <label class="control-label col-md-4">Tagihan</label>
                              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p class="form-control-static"><?php echo "Rp. ".number_format($data->tagihan) ?></p>
                              </div>
                              <label class="control-label col-md-4">Sisa</label>
                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <p class="form-control-static"><?php echo "Rp. ".number_format($data->sisa) ?></p>
                              </div>
                              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <button type="button" class="btn btn-primary btn-xs" onclick="show()">Bayar</button>
                              </div>
                            </div>                          
                            <?php } ?>
                        </form>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">                        
                        <h4>History Angsuran</h4>
                        <table class="table table-striped" id="example">
                           <thead>
                             <tr>
                               <th>ID_TF</th>
                               <th>Date</th>
                               <th>Angsuran</th>
                             </tr>
                           </thead>
                           <tbody>
                             <?php foreach ($angsur as $key) { ?>
                             <tr>
                               <td><?php echo $key->id_tf ?></td>
                               <td><?php echo $key->date ?></td>
                               <td><?php echo number_format($key->cicilan) ?></td>
                             </tr>
                           <?php } ?>
                           </tbody>
                         </table> 
                      </div>
                    </div> <hr>
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <h3>History Pembayaran
                        <small><a href="<?php echo base_url('inputbayar/cetak/'.base64_encode($this->session->userdata('swbayar'))) ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print"></span></a></small>
                      </h3>
                      <table class="table table-bordered table-hover" id="example1">
                        <thead>
                          <tr class="active">
                            <th width="1%">No</th>
                            <th>Date</th>
                            <th>ID_TF</th>
                            <th>Kode</th>
                            <th>Nominal</th>
                            <th>Ket</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; foreach ($history as $key) { ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $key->date ?></td>
                            <td><?php echo $key->id_tf ?></td>
                            <td><?php echo $key->kode_jenis ?></td>                            
                            <td><?php echo number_format($key->bayar) ?></td>
                            <td><?php echo $key->ket ?></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <legend>Form Pembayaran</legend>          
                      <div style="display: none;" id="form">                                     
                      <?php echo form_open('inputbayar/simpan', array('class' => 'form-horizontal')); ?>
                          <div class="form-group">
                            <label class="control-label col-md-4">Jml Tagihan</label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p class="form-control-static" id="tagihan"></p>
                            </div>                            
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-4">Sisa Tagihan</label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p class="form-control-static" id="sisa"></p>
                            </div>                            
                          </div>                        
                          <div class="form-group">
                            <label class="control-label col-md-4">Bayar</label>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <input type="text" name="bayar" class="form-control" placeholder="Jumlah Bayar" onkeyup="reformatText(this)">
                            </div>                            
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-4">Keterangan</label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <textarea name="ket" class="form-control" placeholder="Keterangan"></textarea>
                                <input type="hidden" name="jenis">
                                <input type="hidden" name="siswa">
                                <input type="hidden" name="ta">                                
                            </div>                            
                          </div>
                          <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                              <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Pembayaran ?')">Simpan</button>
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
    <!-- /.box -->
</section>

<div class="modal fade" id="detail" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Bukti Pembayaran</h3>
          </div>
          <div class="modal-body form">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <table class="table table-condensed table-hover">
                 <caption id="title"></caption>
                    <thead>
                      <tr class="info">
                        <th>ID_TF</th>
                        <th>Date</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>                                                
                      </tr>
                    </thead>
                    <tbody id="show_data">
                        
                    </tbody>
               </table>
              </div>
            </div>
          </div>
      <div class="modal-footer">            
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<script>
  function show() {    
        $.ajax({
        url : "<?php echo site_url('index.php/inputbayar/get_bayar')?>/",
        type: "GET",
        dataType: "JSON",
        success: function(data)
          {          
              $('#tagihan').text(data.tagihan);                
              $('#sisa').text(data.sisa);                
              $('[name="jenis"]').val(data.id_jenis);                 
              $('[name="siswa"]').val(data.id_siswa);                 
              $('[name="ta"]').val(data.id_ta);                               
              $('#form').show();                                                                  
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
  }
   String.prototype.reverse = function () {
        return this.split("").reverse().join("");
    }

    function reformatText(input) {        
        var x = input.value;
        x = x.replace(/,/g, ""); // Strip out all commas
        x = x.reverse();
        x = x.replace(/.../g, function (e) {
            return e + ",";
        }); // Insert new commas
        x = x.reverse();
        x = x.replace(/^,/, ""); // Remove leading comma
        input.value = x;
    }    
</script>