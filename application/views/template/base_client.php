<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- bootstrap css -->
	<link rel="stylesheet" href="<?php echo $this->assets->get('cosmo.min.css') ?>">
	<!-- font-awesome -->
	<link rel="stylesheet" href="<?php echo $this->assets->get('font-awesome/css/font-awesome.min.css') ?>">
	<!-- data animate -->
	<link rel="stylesheet" href="<?php echo $this->assets->get('data-animate.css') ?>">
	<!-- data tables -->
	<link rel="stylesheet" href="<?php echo $this->assets->get('datatables/dataTables.bootstrap.css') ?>">
	<!-- sweet alert -->
	<link rel="stylesheet" href="<?php echo $this->assets->get('swal/sweetalert.css') ?>">

	<!-- addOn jQuery -->
	<script src="<?php echo $this->assets->get('jQuery-2.1.4.min.js') ?>"></script>
	<script src="<?php echo $this->assets->get('bootstrap/js/bootstrap.min.js') ?>"></script>

</head>
<body>
	<div class="container">
		<div class="head">
			<h2 style="padding:10px">Aplikasi Pencatatan Zakat Fitrah Masjid/Mushola <br> <small>Pulosari Brebes</small></h2>
		</div>
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Menu</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo site_url('pencatatan-zakat') ?>">Pencatatan Zakat</a></li>
						<li><a href="<?php echo site_url('muzaki') ?>">Muzaki</a></li>
						<li><a href="<?php echo site_url('mustahiq') ?>">Mustahiq</a></li>
						<li><a href="<?php echo site_url('statistik') ?>">Statisktik</a></li>
						<li><a href="<?php echo site_url('statistik-realtime') ?>" target="_blank">Progress Realtime</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<div class="body">
			<div class="panel panel-primary">
				<div class="panel-body">
					<?php echo $content ?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<p class="text-center">Develop By. <a href="https://www.facebook.com/PanduAldiaja" target="_blank">pandu.</a></p>
	</div>

	<!-- addtional jquery -->
	<script src="<?php echo $this->assets->get('datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo $this->assets->get('datatables/dataTables.bootstrap.js') ?>"></script>
	<script src="<?php echo $this->assets->get('jquery-number/jquery.number.min.js') ?>"></script>
	<script src="<?php echo $this->assets->get('jquery_validate/jquery.validate.min.js') ?>"></script>
	<script src="<?php echo $this->assets->get('swal/sweetalert.min.js') ?>"></script>
	<script src="<?php echo $this->assets->get('jquery-animateNumber/jquery.animateNumber.min.js') ?>"></script>

	<script>
		$(function(){
			$("#datatable").dataTable();
		})
	</script>
</body>
</html>