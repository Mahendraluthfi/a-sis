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
		<h3>Data Nilai</h3>
		<div class="pull-right"><?php echo date('d M Y'); ?></div>
<?php foreach ($view as $data) { ?>
		<?php echo $data->nama ?><br>
		<?php echo $data->nama_rombel ?><br>
		<?php echo $data->nama_mapel.' Semester '.$data->semester ?>
		<hr>
		<table align="center" width="50%">	
				<tr>
					<th>Nilai Ulangan Harian 1</th>					
					<td><?php echo $data->nuh1 ?></td>
				</tr>			
				<tr>
					<th>Nilai Ulangan Harian 2</th>					
					<td><?php echo $data->nuh2 ?></td>
				</tr>
				<tr>
					<th>Nilai Ulangan Harian 3</th>					
					<td><?php echo $data->nuh3 ?></td>
				</tr>
				<tr>
					<th>Nilai Ulangan Tugas 1</th>					
					<td><?php echo $data->nt1 ?></td>
				</tr>
				<tr>
					<th>Nilai Ulangan Tugas 2</th>					
					<td><?php echo $data->nt2 ?></td>
				</tr>
				<tr>
					<th>Nilai Ulangan Tugas 3</th>					
					<td><?php echo $data->nt3 ?></td>
				</tr>
				<tr>
					<th>Nilai Mid Semester</th>					
					<td><?php echo $data->mid ?></td>
				</tr>
				<tr>
					<th>Nilai Semester</th>					
					<td><?php echo $data->smt ?></td>
				</tr>
				<tr>
					<th>Rata Nilai Ulangan Harian</th>					
					<td><?php echo $data->rnuh ?></td>
				</tr>
				<tr>
					<th>Nilai Harian</th>					
					<td><?php echo $data->nh ?></td>
				</tr>
				<tr>
					<th>Rata Nilai Tugas</th>					
					<td><?php echo $data->rnt ?></td>
				</tr>
				<tr>
					<th>Nilai Akhir Raport</th>					
					<td><?php echo $data->nar ?></td>
				</tr>
		</table>
	</div>
<?php } ?>	
</body>
</html>