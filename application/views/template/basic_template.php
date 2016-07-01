<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimuim-scale=1">

	<!-- bootstrap css -->
	<link rel="stylesheet" href="<?php echo $this->assets->get("cosmo.min.css") ?>">
	<!-- font-awesome -->
	<link rel="stylesheet" href="<?php echo $this->assets->get("font-awesome/css/font-awesome.min.css") ?>">
	<!-- Data animate -->
	<link rel="stylesheet" href="<?php echo $this->assets->get('data-animate.css') ?>">

	<!-- script -->
	<script src="<?php echo $this->assets->get("jQuery-2.1.4.min.js") ?>"></script>
	<script src="<?php echo $this->assets->get('bootstrap/js/bootstrap.min.js') ?>"></script>

</head>
<body>
	<?php echo $content ?>

	<!-- jQuery Validate -->
	<script src="<?php echo $this->assets->get("jquery_validate/jquery.validate.min.js") ?>"></script>
</body>
</html>