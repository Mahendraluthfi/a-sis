<?php 
  header("Content-type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=template_siswa.xls");
?>
<table border="1">
<tr>
	  <td>No_Reg</td>
	  <td>Nama</td>
    <td>L/P</td>
    <td>Tempat Lahir</td>
    <td>Alamat</td>
  </tr>
  <?php 
  for ($i=0; $i <5 ; $i++) { ?>
    <tr>
    <td><?php echo $noreg++; ?></td>  
    <td></td>  
    <td></td>  
    <td></td>  
    <td></td>  
    </tr>
  <?php } ?>
</table>