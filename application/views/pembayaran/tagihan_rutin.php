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

      <?php echo form_open('inputbayar/save_tagihan'); ?>
      <?php foreach ($row as $data) { ?>
      <tr>
        <td>1</td>
        <td><?php echo $data->nama ?></td>
        <td><?php echo $data->nama_rombel ?></td>
        <td><?php echo number_format($data->tagihan) ?></td>
        <td><?php echo (empty($data->Jul) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Agt) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Sep) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Okt) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Nov) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Des) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Jan) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Feb) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Mar) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Apr) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Mei) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
        <td><?php echo (empty($data->Jun) ? '<input type="checkbox" name="ok[]">' : '<button type="button" class="btn btn-xs"><span class="glyphicon glyphicon-check"></span></button>'); ?></td>
      </tr>
    </tbody>
  </table>
    <input type="hidden" name="tagihan" value="<?php echo $data->tagihan ?>">
    <input type="hidden" name="idjenis" value="<?php echo $data->nama_pilihan ?>">
    <input type="hidden" name="tipe" value="1">
    <input type="hidden" name="ids" value="<?php echo $this->uri->segment(3) ?>">
    <button type="submit" class="btn btn-primary btn-sm">Insert Tagihan</button>
    <?php } ?>
    <?php echo form_close(); ?>
