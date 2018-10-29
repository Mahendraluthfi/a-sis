<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Hak Akses</a></li>
              <li><a href="#tab_2" data-toggle="tab">Perpustakaan</a></li>
              <li><a href="#tab_3" data-toggle="tab">Info Sekolah</a></li>                                        
              <li><a href="#tab_5" data-toggle="tab">Ubah Password</a></li>              
              <li><a href="#tab_6" data-toggle="tab">Backup</a></li>              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <table class="table table-bordered table-hover" id="example">
                  <thead>
                    <tr class="active">
                      <th width="1%">No</th>
                      <th>ID_Akses</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Hak Akses</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($set as $key): ?>                      
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $key->id_akses ?></td>
                      <td><?php echo $key->username ?></td>
                      <td><?php echo $key->level ?></td>
                      <td>
                        <a href="<?php echo base_url('setting/show/'.$key->id_akses) ?>" class="btn btn-success"><i class="fa fa-key"></i></a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              <?php foreach ($denda as $key1) {
                echo "<legend>Setting Maksimal Peminjaman (hari)</legend>";
                echo "<h3>".$key1->max." Hari</h3>";
                echo "<button type='button' class='btn btn-success btn-sm' onclick='edit2(".$key1->id_denda.")'><i class='fa fa-edit'></i> Edit</button>";
                echo "<legend>Tarif Denda Keterlambatan Pengembalian Buku</legend>";
                echo "<h3>Rp. ".$key1->denda."</h3>";
                echo "<button type='button' class='btn btn-success btn-sm' onclick='edit(".$key1->id_denda.")'><i class='fa fa-edit'></i> Edit</button>";
              } ?>
              <div class="modal fade" id="modal_form2" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Edit Max Peminjaman</h3>
                      </div>
                      <div class="modal-body form">
                        <form action="#" id="form2" class="form-horizontal">
                            <div class="form-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3">Max Peminjaman</label>
                                  <div class="col-md-9">
                                    <input name="max" placeholder="Max Peminjaman" class="form-control" type="number" min="1" required="">
                                  </div>
                              </div>                              
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="save2()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              </div>              
              <div class="modal fade" id="modal_form" role="dialog">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Edit Denda</h3>
                      </div>
                      <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <div class="form-body">
                              <div class="form-group">
                                  <label class="control-label col-md-3">Denda</label>
                                  <div class="col-md-9">
                                    <input name="denda" id="kd" placeholder="Denda" class="form-control" type="text" required="">
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
              </div>              
              </div>   

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <?php foreach ($info as $data1) { ?>
                <?php echo form_open_multipart('setting/simpaninfo', array('class'=>'form-horizontal')); ?>
                  <div class="form-group">
                      <label class="control-label col-md-2">Date Reg</label>
                      <div class="col-sm-10 col-md-10">
                        <p class="form-control-static"><?php echo date("d M Y", strtotime($data1->date_reg)); ?></p>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-2">Nama Sekolah</label>
                      <div class="col-sm-10 col-md-4">
                        <input type="text" name="nama_sekolah" value="<?php echo $data1->nama_sekolah ?>" class="form-control">
                      </div>                      
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-2">Alamat</label>
                      <div class="col-sm-10 col-md-4">
                        <textarea name="alamat" class="form-control"><?php echo $data1->alamat ?></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-2">No Telepon</label>
                      <div class="col-sm-4 col-md-4">
                        <input type="text" name="notelp" value="<?php echo $data1->notelp ?>" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-2">Email</label>
                      <div class="col-sm-4 col-md-4">
                        <input type="email" name="email" value="<?php echo $data1->email ?>" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-2">Logo</label>
                      <div class="col-sm-4 col-md-4">
                        <?php if (empty($data1->logo)) { ?>
                          <img src="holder.js/150x150" alt="" class="img-thumbnail"><p></p>                          
                        <?php }else{ ?>
                          <img src="<?php echo base_url('asset/logo/'.$data1->logo) ?>" alt="" class="img-thumbnail" style="height: 150px;"><p></p>
                        <?php } ?>
                        <input type="file" name="logo" accept="image/*">
                      </div>
                  </div>                  
                  <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </div>
                </form>
                <?php } ?>
              </div>              
              <div class="tab-pane" id="tab_5">
                <?php echo form_open('setting/change', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                      <label class="control-label col-md-2">Password</label>
                      <div class="col-md-4">
                        <input type="password" name="pOld" class="form-control" placeholder="Password Anda">
                      </div>                    
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2">New Password</label>
                      <div class="col-md-4">
                        <input type="password" name="pNew" class="form-control" placeholder="Password Baru" id="txtPassword">                                          
                      </div>                    
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2">Confirm New Password</label>
                      <div class="col-md-4">
                        <input type="password" name="cNew" class="form-control" placeholder="Konfirmasi Password Baru" id="txtConfirmPassword">                                          
                      </div>                    
                    </div>
                    <div class="form-group">                      
                      <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
                      </div>
                    </div>
                </form>
              </div>
              <div class="tab-pane" id="tab_6">
                <a href="<?php echo base_url('dbackup/db') ?>" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-download"></span> Backup Database</a>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>