<section class="content-header">
  <h1>
    Input Tabungan  
  </h1>
 <ol class="breadcrumb">
    <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>    
    <li><a href="<?php echo base_url('tabungan') ?>">Tabungan</a></li>
    <li class="active">Input Tabungan</li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header"></div>            
                <div class="box-body">
                    <?php echo form_open('tabungan/save', array('class' => 'form-horizontal', 'id' => 'form')); ?>
                        <div class="form-group">
                            <label class="control-label col-md-2">ID TF</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <h3><?php echo $idtf; ?></h3>
                                <input type="hidden" name="idtf" value="<?php echo $idtf; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Kelas</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <select name="kelas" class="form-control" id="kelas" required="">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($kelas as $data) { ?>
                                    <option value="<?php echo $data->id_kelas ?>"><?php echo $data->nama_kelas ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Rombel</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <select name="rombel" class="form-control" id="rombel2" required="">
                                    <option value="">-- Pilih --</option>              
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Nama Siswa</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <select name="siswa" class="form-control" id="siswa" required="">
                                    <option value="">-- Pilih --</option>                                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Jenis</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <select name="jenis" class="form-control">
                                    <option value="1">Pemasukan</option>                                    
                                    <option value="2">Pengeluaran</option>                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Nominal</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" class="form-control" placeholder="Nominal" name="nominal" onkeyup="reformatText(this)">
                                </div>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Keterangan</label>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <textarea name="ket" class="form-control" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data ?')">Input</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>

<script>
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
