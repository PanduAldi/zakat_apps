<div class="notif">
	<?php echo $this->session->flashdata('alert-success'); ?>
</div>
<div class="row">
	<div class="col-lg-5" data-animate="fadeInLeft">
		<div class="alert alert-info">
			<i class="fa fa-info"></i> Halaman ini untuk Amil yang akan melakukan pencatatan Zakat Fitrah maupun Infaq. isi form disamping untuk melakukan pencatatan. Lakukan Sesuai Prosedur. Form tidak boleh kosong.
		</div>
		<div class="alert alert-warning">
			<i class="fa fa-info"></i> MUZAKKI =  Orang yang mengeluarkan Zakat.
		</div>		
	</div>
	<div class="col-md-7" data-animate="fadeInRight">
		<form action="<?php echo site_url('simpan-zakat') ?>" method="post" id="f_zakat">
			<div class="form-group">
				<label for="" class="control-label">Nama Muzakki :</label>
				<input type="text" name="nama" id="nama" class="form-control text-capitalize"  placeholder="Masukan Nama Muzakki">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Jenis Zakat :</label>
				<select name="jenis_zakat" class="form-control" id="zakat">
					<option value="">-- Pilih jenis Zakat--</option>
					<?php foreach ($zakat as $z): ?>
						<option value="<?php echo $z->id_zakat ?>"><?php echo ucwords($z->jenis_zakat) ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Nominal : </label>
				<div class="input-group">
					<span class="input-group-addon simbol"></span>
					<input type="text" name="nominal" class="form-control nominal" readonly="">
					<span class="input-group-addon simbol2"></span>
				</div>
			</div>
			<div class="form-gruop">
				<button type="submit" name="simpan" class="btn btn-primary"> Simpan Data </button>
			</div>
		</form>
	</div>
</div>
<hr>
<div class="well well-sm"><strong>Data Transaksi </strong></div>
<p align="right"><a href="<?php echo site_url('cetak-zakat') ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak Dokumen</a></p>
<div class="load_data"></div>
<div class="">
	<table class="table table-bordered table-hover" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis Zakat</th>
				<th>Nominal</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($data_muzaki as $m): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $m->nama_muzaki ?></td>
				<td><?php echo $m->jenis_zakat ?></td>
				<td>
					<?php  
						if ($m->id_zakat == '1') 
						{
							echo $m->nominal." Kg";
						}
						else if($m->id_zakat == '2')
						{
							echo "Rp. ".number_format($m->nominal, 0, ',', '.');
						}
					?>
				</td>
			</tr>						
			<?php endforeach ?>		
		</tbody>
	</table> 
</div>

<script>
	
	//Nominal
	$(function(){

		$("#nama").focus();

		$("#zakat").change(function(){
			var kode  = $("#zakat").val();

			if (kode == "1") 
			{
				$(".nominal").val("2.5");
				$(".simbol").html('Beras');
				$('.simbol2').html('Kg');
				$(".nominal").attr({
					readonly: 'readonly'
				});;
			}
			else if(kode == "2")
			{	
				$(".nominal").val("");
				$(".simbol").html('Rp.');
				$('.simbol2').html('.00');
				$(".nominal").removeAttr('readonly');
				$(".nominal").attr({
					placeholder: 'Masukan Nominal Infaq'
				});
				$(".nominal").focus();
			}				
			else
			{
				$(".simbol").html('');
				$('.simbol2').html('');
				$(".nominal").attr({
					readonly: 'readonly',
				});
				$(".nominal").removeAttr('placeholder');
				$(".nominal").val("");
			}
		});


		//jquery validate
		$("#f_zakat").validate({
			rules : {
				nama : "required",
				jenis_zakat : "required",
				nominal : "required"
			},

			messages : {
				nama : {
					required  : '<div class="text-danger" data-animate="fadeInLeft">Harus di isi</div>'
				},
				jenis_zakat : {
					required : '<div class="text-danger" data-animate="fadeInLeft">Jenis Zakat dipilh terlebih dahulu</div>'
				},
				nominal : {
					required : '<div class="text-danger" data-animate="fadeInLeft">Nominal tidak boleh kosong</div>'
				}
			}
		});

		$(".notif").delay(1000).fadeOut(500);

	})

</script>


