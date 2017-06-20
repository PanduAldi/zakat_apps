<style>
	.fontnya {
		font-size: 100px;
	}

	.font {
		font-size: 50px;
	}

	.gede {
		height: 225px;
	}

</style>
<div class="well well-sm">
	<marquee behavior="" truespeed="700" direction="">Halaman ini untuk melihat progress Pencatatan Zakat secara Realtime.</marquee>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					JUMLAH TOTAL ZAKAT FITRAH
				</div>
				<div class="panel-body">
					<h1 align="center" class="zakat fontnya">0</h1> 
					<h3 align="center"><span class="kwintal"></span></h3>
				</div>
			</div>				
		</div>
		<div class="col-lg-6">
			<div class="panel panel-primary gede">
				<div class="panel-heading">
					JUMLAH TOTAL INFAQ
				</div>
				<div class="panel-body">
					<h1 align="center" class="infaq font">0</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					JUMLAH TOTAL OANG MEMBAYAR ZAKAT FITRAH
				</div>
				<div class="panel-body">
					<h1 align="center" class="orang_zakat fontnya">0</h1>
				</div>
			</div>				
		</div>
		<div class="col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					JUMLAH TOTAL ORANG YANG MEMBAYAR INFAQ
				</div>
				<div class="panel-body">
					<h1 align="center" class="orang_infaq fontnya">0</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="footer">
	<p align="center">Sing gawe. <a href="https://facebook.com/PanduAldiaja" target="_blank">udnaP :p</a></p>
</div>

<script>
	
	$(function(){
		setInterval(load_data, 2000);
	})

	function load_data()
	{
		$.ajax({
			url : "<?php echo site_url('load-data') ?>",
			dataType : "JSON",
			success : function(msg){
				$(".zakat").html(msg.zakat);
				$(".infaq").html(msg.infaq);
				$(".orang_zakat").html(msg.orang_zakat);
				$(".orang_infaq").html(msg.orang_infaq);
				$(".kwintal").html(msg.kwintal);
			}
		})
	}
</script>