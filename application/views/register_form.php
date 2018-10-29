<p class="login-box-msg"><b>Registrasi</b></p>
    <?php echo form_open('register/submit', array('data-toggle' => 'validator', 'role' => 'form')); ?>
    <div class="form-group">    
        <input type="text" class="form-control" id="inputName" placeholder="Nama Sekolah" name="nama" required>        
    </div>
    <div class="form-group">    
        <textarea class="form-control" name="alamat" placeholder="Alamat Sekolah" required></textarea>     
    </div>
    <div class="form-group" id="staticParent">    
        <input type="text" class="form-control" name="notelp" placeholder="Nomor Telepon" id="child">     
    </div>
    <div class="form-group">  
        <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Alamat Email tidak valid" name="email" required>
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">          
        <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
        <div class="help-block">Minimum of 6 characters</div>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Password tidak sama" placeholder="Retype Password" required>
        <div class="help-block with-errors"></div>
    </div> 
    
    <div class="form-group text-center">
      <button type="submit" class="btn btn-primary">Register</button>      
    </div>
  <?php echo form_close(); ?>