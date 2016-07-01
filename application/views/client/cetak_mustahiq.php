<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
</head>

<style>
	  .table {
	    border-collapse: collapse !important;
	  }
	  .table td,
	  .table th {
	    background-color: #fff !important;
	    padding: 5pt;
	  }
	  .table-bordered th,
	  .table-bordered td {
	    border: 1px solid black !important;
	  }
</style>

<body>
	<table>
		<tr>
			<td><img src="<?php echo base_url('img/logo.png') ?>" width="100" height="100" alt=""></td>
			<td style="width:610px" align="center">
				<h3>PANITIA ZAKAT FITRAH  </h3>
				<p align="center">Masjid  / Mushola Desa Pulosari Brebes</p>
			</td>
		</tr>
	</table>
	<hr>
	<p align="center"><strong>Data Mustahiq</strong></p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="30">No</th>
				<th width="200">Nama</th>
				<th width="300">Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($mustahiq as $m): ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $m->mustahiq ?></td>
					<td><?php echo $m->keterangan ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>