<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-cog"></i> Setting  
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li class="active">Setting</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-sm-12 col-md-12">
          <!-- Custom Tabs -->
         <?php $this->load->view($sign); ?>
          <!-- nav-tabs-custom -->          
    </div>
  </div>
</section>
<script>
  function edit(id)
    {
       gid = id;
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/setting/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        { 
            $('[name="denda"]').val(data.denda);           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    function save(){
      var url;      
        url = "<?php echo site_url('index.php/setting/editdenda/')?>" + gid;               

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
<script>  
  function edit2(id)
    {
       gid = id;
      $('#form2')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/setting/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        { 
            $('[name="max"]').val(data.max);           
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    function save2(){
      var url;      
        url = "<?php echo site_url('index.php/setting/editmax/')?>" + gid;               

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form2').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form2').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }  
</script>