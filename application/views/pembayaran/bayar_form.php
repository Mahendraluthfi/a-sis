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
                  <h3>Data Tagihan</h3>
                </div>            
                <div class="box-body">                  
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <table class="table table-condensed table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Rombel</th>
                                <th>Tagihan</th>
                                <th>Jul</th>
                                <th>Agt</th>
                                <th>Sep</th>
                                <th>Okt</th>
                                <th>Nov</th>
                                <th>Des</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>Mei</th>
                                <th>Jun</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($row as $data) { ?>
                              <tr>
                                <td>1</td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->nama_rombel ?></td>
                                <td><?php echo number_format($data->tagihan) ?></td>
                                <td><?php echo (empty($data->Jul) ? '<button type="button" class="btn btn-xs" onclick="show(\'Jul\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Jul\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Agt) ? '<button type="button" class="btn btn-xs" onclick="show(\'Agt\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Agt\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Sep) ? '<button type="button" class="btn btn-xs" onclick="show(\'Sep\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Sep\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Okt) ? '<button type="button" class="btn btn-xs" onclick="show(\'Okt\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Okt\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Nov) ? '<button type="button" class="btn btn-xs" onclick="show(\'Nov\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Nov\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Des) ? '<button type="button" class="btn btn-xs" onclick="show(\'Des\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Des\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Jan) ? '<button type="button" class="btn btn-xs" onclick="show(\'Jan\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Jan\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Feb) ? '<button type="button" class="btn btn-xs" onclick="show(\'Feb\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Feb\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Mar) ? '<button type="button" class="btn btn-xs" onclick="show(\'Mar\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Mar\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Apr) ? '<button type="button" class="btn btn-xs" onclick="show(\'Apr\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Apr\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Mei) ? '<button type="button" class="btn btn-xs" onclick="show(\'Mei\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Mei\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
                                <td><?php echo (empty($data->Jun) ? '<button type="button" class="btn btn-xs" onclick="show(\'Jun\')">bayar</button>' : '<button type="button" class="btn btn-xs" onclick="detail(\''.$data->Jul.'\',\'Jun\')"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
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
                      <table class="table table-bordered table-hover" id="example">
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
                            <label class="control-label col-md-4">Jenis Tagihan/Bln</label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p class="form-control-static" id="jenis"></p>
                            </div>                            
                          </div>                        
                          <div class="form-group">
                            <label class="control-label col-md-4">Jml Tagihan</label>
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p class="form-control-static" id="tagihan"></p>
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
                                <input type="hidden" name="bulan">
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
  function show(id) {    
        $.ajax({
        url : "<?php echo site_url('index.php/inputbayar/get_bayar')?>/",
        type: "GET",
        dataType: "JSON",
        success: function(data)
          {
            var bilangan = data.tagihan;
          var number_string = bilangan.toString(),
          sisa  = number_string.length % 3,
          rupiah  = number_string.substr(0, sisa),
          ribuan  = number_string.substr(sisa).match(/\d{3}/g);
            
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
              $('#jenis').text(data.nama_pilihan+' / '+id);
              $('#tagihan').text('Rp. ' +rupiah);                
              $('[name="jenis"]').val(data.id_jenis);                 
              $('[name="siswa"]').val(data.id_siswa);                 
              $('[name="ta"]').val(data.id_ta);                 
              $('[name="bulan"]').val(id);                 
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
    function detail(inv,bln) {      
        $.ajax({
        url : "<?php echo site_url('index.php/inputbayar/detail_inv')?>/"+ inv,
        type: "GET",
        dataType: "JSON",
        success: function(data)
          {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
            var bilangan = data[i].bayar;
            var number_string = bilangan.toString(),
            sisa  = number_string.length % 3,
            rupiah  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);          
            if (ribuan) {
              separator = sisa ? '.' : '';
              rupiah += separator + ribuan.join('.');
            }
              html += "<tr>"+                        
                  "<td>"+data[i].id_tf+"</td>"+
                  "<td>"+data[i].date+"</td>"+
                  "<td>"+rupiah+"</td>"+                  
                  "<td>"+data[i].ket+"</td>"+
                  "</tr>";
              }
              $('#show_data').html(html);              
              $("#title").text(bln);
              $("#detail").modal("show");
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
    }
</script>