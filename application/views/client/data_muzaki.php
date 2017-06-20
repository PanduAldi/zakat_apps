<div class="row">
	<div class="col-lg-4">
		<div class="alert alert-info">
			<i class="fa fa-info"></i> Daftar orang-orang yang sudah mengeluarkan zakat fitrah ataupun infaq. Data tersebut dapat dihapus.
		</div>
		<div class="alert alert-success"><i class="fa fa-info"></i> <strong>Catatan</strong> : Data yang dihapus akan mempengaruhi perhitungan transaksi zakat. Karena muzakki di input setiap ada transaksi.</div>
	</div>
	<div class="col-lg-8">
		<table class="table table-bordered table-hover" id="datatable">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Muzakki</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($muzaki as $m): ?>
					<tr id="id_<?php echo $m->id_muzaki ?>">
						<td><?php echo $no++ ?></td>
						<td><?php echo $m->nama_muzaki ?></td>
						<td>
							<a class="btn btn-primary" onclick="hapus(<?php echo $m->id_muzaki ?>)"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<script>

	function hapus(id){
		$(function(){
			$.ajax({
					url : "<?php echo site_url('hapus-muzaki') ?>",
					type : "POST",
					data  : {
						kode : id
					},
					success : function(){
						$("#id_"+id).fadeOut(300);	
					}
				})			
		})
	}
</script>