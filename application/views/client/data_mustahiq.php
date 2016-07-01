<div class="row">
	<div class="col-lg-4">
		<div class="alert alert-info">
			<i class="fa fa-info"></i> Halaman ini untuk megelola data mustahiq/Penerima Zakat. Data akan tersimpan di database, dan dapat dicetak untuk keperluan pembagian zakat. Untuk menambahkan data mustahiq silahkan isi form yang ada di samping.	
		</div>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				Tambah Mustahiq
			</div>
			<div class="panel-body">
				<form action="" method="POST" id="f_mustahiq">
					<div class="form-group">
						<input type="text" name="mustahiq" id="mustahiq" class="form-control text-capitalize" placeholder="Masukan Mama Mustahiq">
					</div>
					<div class="form-group">
						<textarea name="keterangan" class="form-control" id="keterangan" rows="5" placeholder="Keterangan tambahan"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="well well-sm"><strong>Data Mustahiq</strong> <span style="margin-left: 74%"><a href="<?php echo site_url('cetak-mustahiq') ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak Data Mustahiq</a></span></div>
<p align="center"></p>
<table class="table table-bordered table-striped" id="datatable">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Keterangan </th>
			<th width="80">#</th>
		</tr>
	</thead>
	<tbody class="datanya">
		<?php foreach ($data_mustahiq as $m): ?>
			<tr class="id_<?php echo $m->id_mustahiq ?>">
				<td><?php echo ucwords($m->mustahiq) ?></td>
				<td><?php echo $m->keterangan ?></td>
				<td>
					<a class="btn btn-danger" onclick="hapus(<?php echo $m->id_mustahiq ?>)"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script>
	$(function(){

		$("#f_mustahiq").validate({
			rules : {
				mustahiq : "required"
			},
			messages : {
				mustahiq : {required : '<div class="text-danger" data-animate>Harus di Isi</div>'}
			},

			submitHandler : function(){
				$.ajax({
					url  : "<?php echo site_url('simpan-mustahiq') ?>",
					type : "POST",
					data : {
						mustahiq : $("#mustahiq").val(),
						keterangan : $("#keterangan").val()
					},
					success : function(){
						swal("Berhasil", "Data Berhasil di Tambah", "success");
						location.reload();
					}
				})
			}
		})
	})

	function hapus(ev)
	{
		$(function(){
			$.ajax({
				url  : "<?php echo site_url('hapus-mustahiq') ?>",
				type : "POST",
				data : { kode : ev },
				success : function(){
					$(".id_"+ev).fadeOut(500);
				}
			})		
		})
		
	}
</script>