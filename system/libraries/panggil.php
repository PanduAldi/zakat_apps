<?php  

	spl_autoload_register(function ($class){
		include $class.".php";
	});

	$rob = new robot('Pandu', 'Honda');

	$rob->nama();
?>