<div class="jumbotron">
	<div class="container">
		<h1>Hai, <?php echo $this->session->userdata('username'); ?></h1>
		<p>Panel ini digunakan untuk mengontrol jalannya aktivitas transaksi pada Zakat APP. Pastikan Aplikasi dalam keadaan aktif, untuk melakukan transaksi.</p>
		<small>Untuk mengaktifkan aplikasi, silahkan klik tombaol dibawah.</small>
		<br>
		<br>
		<br>
		<br>
		<p align="center">
			<?php  
				$display;

				if ($cek_server->status == 0) 
				{
					 ?>
					<a class="btn btn-success aktif"><i class="fa fa-power-off"></i> Aktifkan Aplikasi</a>
					<a class="btn btn-danger nonaktif" style="display:none"><i class="fa fa-power-off"></i> Matikan Aplikasi</a>	
					<p class="running" align="center"></p>			
					 <?php
				}
				elseif ($cek_server->status == 1) 
				{
					?>
					<a class="btn btn-success aktif" style="display:none"><i class="fa fa-power-off"></i> Aktifkan Aplikasi</a>
					<a class="btn btn-danger nonaktif"><i class="fa fa-power-off"></i> Matikan Aplikasi</a>
					<p align="center" class="running">Aplikasi Sedang Berjalan ... </p>
					<?php
				}
			?>

		</p>
	</div>
</div>

<script>
	
	$(function(){
		
		$(".aktif").click(function(){

			$.ajax({
				url : "<?php echo site_url('aktif-aplikasi') ?>",
				beforeSend : function(){
					$(".aktif").html("Mengaktifkan Aplikasi ....");
				},
				success : function(msg){
					$(".aktif").attr({
						style : 'display:none'
					});
					$(".nonaktif").removeAttr('style');
					$(".nonaktif").html('<i class="fa fa-power-off"></i> Matikan Aplikasi');
					$(".running").html('Aplikasi Sedang Berjalan ...');
				}
			})
		})

		$(".nonaktif").click(function(){

			$.ajax({
				url : "<?php echo site_url('nonaktif-aplikasi') ?>",
				beforeSend : function(){
					$(".nonaktif").html("Mengaktifkan Aplikasi ....");
				},
				success : function(msg){
					$(".nonaktif").attr({
						style : 'display:none'
					});
					$(".aktif").removeAttr('style');
					$(".aktif").html('<i class="fa fa-power-off"></i> Aktifkan Aplikasi');
					$(".running").html('');
				}
			})			
		});
	})

</script>