<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">                        
              <li class="active"><a href="#tab_5" data-toggle="tab">Ubah Password</a></li>              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_5">
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
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>