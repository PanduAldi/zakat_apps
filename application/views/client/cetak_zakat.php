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
	<p align="center"><strong>Data Pencatatan Zakat</strong></p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="40">No</th>
				<th width="200">Nama</th>
				<th width="100">Jenis Zakat</th>
				<th width="160">Nominal</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($zakat as $m): ?>
				<tr>
					<td align="center"><?php echo $no++ ?></td>
					<td><?php echo ucwords($m->nama_muzaki) ?></td>
					<td><?php echo ucwords($m->jenis_zakat) ?></td>
					<td>
						<?php  
							if ($m->id_zakat == 1) 
							{
								echo $m->nominal." Kg";
							}
							else if($m->id_zakat == 2)
							{
								echo "Rp. ".number_format($m->nominal, 0, ',', '.');
							}
						?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>