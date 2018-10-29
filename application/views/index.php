<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminSiS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">  
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/font-awesome/css/font-awesome.min.css">  
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/dist/css/AdminLTE.min.css">  
  <link rel="stylesheet" href="<?php echo base_url()?>asset/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/select2/dist/css/select2-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/plugins/iCheck/all.css">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>asset/favicon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?php echo base_url()?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <style type="text/css">
    #notifications {
      cursor: pointer;
      position: fixed;
      right: 0px;
      z-index: 9999;
      bottom: 0px;
      margin-bottom: 22px;
      margin-right: 15px;
      min-width: 300px; 
      max-width: 800px;   
    }
  </style>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>-SiS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin A-SiS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>asset/dist/img/user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>asset/dist/img/user.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('username'); ?> 
                  <small>A-SiS</small>                
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">               
                <!-- /.row -->
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="<?php echo base_url() ?>setting" class="btn btn-default btn-sm"><i class="fa fa-cog"></i> Setting</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="<?php echo base_url() ?>login/logout" class="btn btn-default btn-sm" onclick="return confirm('Yakin Logout ?')"><i class="fa fa-sign-out"></i> Logout</a>                    
                  </div>
                </div>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer"></li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>asset/dist/img/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header bg-blue-active">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="" onclick="window.location.href='<?php echo base_url() ?>dashboard'">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>    
          </a>       
        </li>  
         <?php
                $sid = $this->session->userdata('id');
                $main = $this->db->query("SELECT sis_privilage.*, sis_modul.* FROM sis_privilage JOIN sis_modul ON sis_privilage.id_modul=sis_modul.id_modul WHERE sis_privilage.id_akses = '$sid' and sis_modul.ktg = '0'");
                foreach ($main->result() as $m) {
                    // chek ada submenu atau tidak
                    $sub = $this->db->query("SELECT sis_privilage.*, sis_modul.* FROM sis_privilage JOIN sis_modul ON sis_privilage.id_modul=sis_modul.id_modul WHERE sis_privilage.id_akses = '$sid' and sis_modul.ktg = '$m->id_modul'");
                    $s_array = $sub->result_array();
                    if ($sub->num_rows() > 0) { ?>
                        <!-- ini menu           -->
                        <li class="treeview">
                          <a href="<?php echo base_url().$m->url ?>">
                            <i class="<?php echo $m->glyphicon; ?>"></i>
                            <span><?php echo $m->nama_span; ?></span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                        <?php foreach ($sub->result() as $s) { ?>
                        <!-- ini submenu -->                        
                          <li class="<?php if($this->uri->segment(1) == $s->nama_modul){ echo "active"; } ?>">
                            <a href="<?php echo base_url().$s->url ?>">
                              <i class="<?php echo $s->glyphicon; ?>"></i> <span><?php echo $s->nama_span; ?></span>    
                            </a>       
                          </li>  
                       <?php }
                       echo "</ul></li>";
                     } else { ?> 
                        <!-- in single menu --> 
                       <li class="treeview">
                        <a href="<?php echo base_url().$m->url ?>">
                          <i class="<?php echo $m->glyphicon; ?>"></i> <span><?php echo $m->nama_span; ?></span>    
                        </a>       
                      </li>                                                  
                      <?php }} ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <?php $this->load->view($content); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>  

<!--   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Research and Development Excellent Computer</a></strong>
  </footer> -->

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url()?>asset/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>asset/dist/js/demo.js"></script>
<script src="<?php echo base_url()?>asset/dist/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url()?>asset/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<!-- <script src="<?php echo base_url()?>asset/dist/js/hakakses.js"></script> -->
<script>
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');  
    $(function () {
      $('#nilai').DataTable({
          'scrollY': 200,
          'paging' : false,
          'ordering' : false,
          'searching' : false
      })
      $('#tabungan').DataTable({          
          'ordering' : false          
      })
      $('#example').DataTable()
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
      $('#scrollh').DataTable({
        "scrollX": true
        })
      $('#example3').DataTable({
          "iDisplayLength": 20
      });
      $('#example4').DataTable({
          "iDisplayLength": 20
      });
      $('#example5').DataTable({
        "columnDefs": [
          { "orderable": false, "targets": 0 }
        ]        
      });
      $('#example6').DataTable({
        "columnDefs": [
          { "orderable": false, "targets": 0 }
        ]        
      });
    })
   $('select').select2({
        theme: 'bootstrap'
    });
   $('#datepicker').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd',      
    })
   $('#datepicker1').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })
   $('#datepicker2').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })
   $('#datepicker3').datepicker({
      autoclose: true,
      format : 'yyyy-mm-dd'
    })
   $(function() {
            $('#bulan').datepicker({
              viewMode: "months", 
              minViewMode: "months",
              format: 'mm-yyyy'
            })
        .on('changeDate', function(ev){                 
         $('#bulan').datepicker('hide');
    });
    });
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    $(document).ready(function(){
      $('#jenjang').change(function(){
        var id=$(this).val();
        $.ajax({
          url : "<?php echo base_url();?>siswa/get_rombel",
          method : "POST",
          data : {id: id},
          async : false,
              dataType : 'json',
          success: function(data){
            var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += "<option value='"+data[i].id_rombel+"'>"+data[i].nama_rombel+"</option>";
                  }
                  $('#rombel').html(html);            
          }
        });
      });
    });
    $(function() {
        $('#kampret').daterangepicker({                            
          "drops": "up",
          locale: {
            format: 'YYYY-MM-DD'
          }
      });
    });
    $(function() {
        $('#kampret2').daterangepicker({                                   
          locale: {
            format: 'YYYY-MM-DD'
          }
      });
    });
    $("#call").click(function () {
        $('.cb').prop('checked',$(this).prop('checked'))
        
    });
    $('#tabel1').on('click','.cb',function(){
        var ca = true        
        $('.cb').each(function(){
            if(!$(this).prop('checked')){
                ca =false              
            }
        })        
        $("#call").prop('checked',ca)                
    });         
    $('#example5').on('click','.cb',function(){
        var ca = true        
        $('.cb').each(function(){
            if(!$(this).prop('checked')){
                ca =false              
            }
        })        
        $("#call").prop('checked',ca)                
    }); 
    $("#call2").click(function () {
        $('.cb2').prop('checked',$(this).prop('checked'))
        
    });
    $('#example6').on('click','.cb2',function(){
        var ca = true        
        $('.cb2').each(function(){
            if(!$(this).prop('checked')){
                ca =false              
            }
        })        
        $("#call2").prop('checked',ca)                
    });   
    $(document).ready(function () {
    var ckbox = $('.cb');
      $('input').on('click',function () {
          if (ckbox.is(':checked')) {
            $('#chkout').removeAttr('disabled');
          } else {
            $('#chkout').attr('disabled','disabled');              
            //alert('You Un-Checked it');
          }
      });
    });
  $.validate({
    lang: 'en'
  });  
  $(function () {
    $("#btnSubmit").click(function () {
      var password = $("#txtPassword").val();
      var confirmPassword = $("#txtConfirmPassword").val();
        if (password != confirmPassword) {
          alert("Passwords do not match.");
            return false;
        }
          return true;
      });
     $("#btnprint").click(function () {
        window.print();
     });
  }); 
  $(document).ready(function(){
    $('#kelas').change(function(){
      var id=$(this).val();
        $.ajax({
        url : "<?php echo base_url();?>index.php/anggota/get_rombel",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          html += '<option value="0">-- Pilih --</option>';          
          for(i=0; i<data.length; i++){
              html += '<option value="'+data[i].id_rombel+'">'+data[i].nama_rombel+'</option>';
          }
          $('#rombel').html(html);            
        }
      });
    });
  }); 
  $(document).ready(function(){
    $('#kelas').change(function(){
      var id=$(this).val();
        $.ajax({
        url : "<?php echo base_url();?>index.php/anggota/get_rombel",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          html += '<option value="0">-- Pilih --</option>';          
          for(i=0; i<data.length; i++){
              html += '<option value="'+data[i].id_rombel+'">'+data[i].nama_rombel+'</option>';
          }
          $('#rombel2').html(html);            
        }
      });
    });
  });
  $(document).ready(function(){
    $('#rombel').change(function(){
      var id=$(this).val();
        $.ajax({
        url : "<?php echo base_url();?>index.php/anggota/get_siswa",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          html += '<option value="0">-- Pilih --</option>';                    
          for(i=0; i<data.length; i++){
              html += '<option value="'+data[i].id_siswa+'">'+data[i].nama+'</option>';
          }
        $('#siswa').html(html);            
        }
      });
    });
  });
  $(document).ready(function(){
    $('#rombel2').change(function(){
      var id=$(this).val();
        $.ajax({
        url : "<?php echo base_url();?>index.php/tabungan/get_siswa",
        method : "POST",
        data : {id: id},
        async : false,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          html += '<option value="0">-- Pilih --</option>';                    
          for(i=0; i<data.length; i++){
              html += '<option value="'+data[i].id_siswa+'">'+data[i].nama+'</option>';
          }
        $('#siswa').html(html);            
        }
      });
    });
  });
  $(document).ready(function(){
    $('#jenis').on('change', function() {
      if (this.value == '1' || this.value == '2'){
        $("#choice").show();
        $("#lulus").hide();
        $("#pindah").hide();                                      
      }else if(this.value == '4'){
        $("#lulus").show();        
        $("#pindah").hide();                              
      }else{
        $("#choice").hide();
        $("#lulus").hide();
        $("#pindah").show();                      
      }
    });
  }); 
</script>
</body>
</html>
