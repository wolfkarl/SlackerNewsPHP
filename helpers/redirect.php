<?php
	function error()
	{
		redirect('error.htm');
	}

	function redirect($extra = '')
	{
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("Location: http://$host$uri/$extra");
	}

	?>