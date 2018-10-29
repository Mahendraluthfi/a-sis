<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>	
</head>
<body>
	<div class="container">
		<center><h2>Rekap Data Nilai</h2></center>				
		<?php foreach ($mapel as $key): ?>
		<h4><?php echo $key->nama_mapel ?></h4>
		<?php endforeach ?>
		<?php foreach ($rombel as $key1): ?>
		<h4><?php echo $key1->nama_rombel." (Semester ".$this->session->userdata('smt').")" ?></h4>
		<?php endforeach ?>
	<hr>
	<table border="1" cellspacing="2" cellpadding="2" style="border-collapse: collapse;" width="100%">
		<thead>
			<tr>
				<th width="1%">No</th>
				<th width="1%">NIS</th>
				<th>Nama</th>
				<th width="1%">NUH1</th>
				<th width="1%">NUH2</th>
				<th width="1%">NUH3</th>
				<th width="1%">NT1</th>
				<th width="1%">NT2</th>
				<th width="1%">NT3</th>
				<th width="1%">MID</th>
				<th width="1%">SMT</th>
				<th width="1%">RNUH</th>
				<th width="1%">RNT</th>
				<th width="1%">NH</th>
				<th width="1%">NAR</th>										
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
			foreach ($get_siswa as $data) { 
				
				?>
			<tr align="center">
				<td><?php echo $no++; ?></td>
				<td><?php echo $data->nis; ?></td>
				<td><?php echo $data->nama; ?></td>
				<td><?php echo $data->nuh1; ?></td>
				<td><?php echo $data->nuh2; ?></td>
				<td><?php echo $data->nuh3; ?></td>
				<td><?php echo $data->nt1; ?></td>
				<td><?php echo $data->nt2; ?></td>
				<td><?php echo $data->nt3; ?></td>
				<td><?php echo $data->mid; ?></td>
				<td><?php echo $data->smt; ?></td>
				<td><?php echo $data->rnuh; ?></td>
				<td><?php echo $data->rnt; ?></td>
				<td><?php echo $data->nh; ?></td>
				<td><?php echo $data->nar; ?></td>										
			</tr>
			<?php } ?>
		</tbody>						
	</table>
	</div>
</body>
</html>