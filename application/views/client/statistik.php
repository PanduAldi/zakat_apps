<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				Jumlah Total Zakat Fitrah
			</div>
			<div class="panel-body">
				<p align="center" style="font-size: 50px">
					<?php echo $jumlah_zakat->jumlah." Kg"  ?>
				</p>
				<p align="center"><?php echo $jumlah_zakat->jumlah / 1000 ?> Kwintal</p>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				Jumlah Total Infaq
			</div>
			<div class="panel-body">
				<p align="center" style="font-size: 50px;">
					<?php echo "Rp. ".number_format($jumlah_infaq->jumlah,0,',','.').",-"  ?>
				</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				Jumlah Muzakki Membayar Zakat Fitrah
			</div>
			<div class="panel-body">
					<p align="center" style="font-size: 50px">
						<?php echo $jumlah_orang_zakat_fitrah->jumlah." Orang" ?>
					</p>
			</div>
		</div>		
	</div>
	<div class="col-lg-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				Jumlah Muzakki Membayar Infaq
			</div>
			<div class="panel-body">
					<p align="center" style="font-size: 50px">
						<?php echo $jumlah_orang_infaq->jumlah." Orang" ?>
					</p>
			</div>
		</div>
	</div>
</div>
