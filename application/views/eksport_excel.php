<?php 

	header("Content-Type:application/vnd.ms-excel");
	header('Content-Disposition:attachment; filename="contoh.xls"');
?>
<h1 align="center">Contoh Data</h1>
<br>
<table border="1">
	<tr>
		<th>Nama</th>
	</tr>
	<?php foreach ($data as $k): ?>
		<tr>
			<td><?php echo $k->nama_muzaki ?></td>
			<td><?php echo $total->jum ?></td>
		</tr>
	<?php endforeach ?>
</table>

