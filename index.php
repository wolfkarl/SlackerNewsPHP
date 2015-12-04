<?php


	// CONFIG

	define("DEFAULT_CONTROLLER", 'latest');



	$start = microtime(true);
	$params = array();

	// LOAD

	require('helpers/hash.php');

	require('lib/rb.php'); // RedBean ORM
	R::setup( 'sqlite:data/slacker.db');

	require_once 'lib/Twig/Autoloader.php';
	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem('views/');
	$twig = new Twig_Environment($loader, array('debug' => true));

	$twig->addExtension(new Twig_Extension_Debug()); # debug


	// SESSION

	// server should keep session data for AT LEAST 1 hour
	ini_set('session.gc_maxlifetime', 360000);

	// each client should remember their session id for EXACTLY 1 hour
	session_set_cookie_params(360000);

	session_start();
	if (isset($_SESSION['user']))
	{
		$user = $_SESSION['user'];
		$params['user'] = $user;
	}


	if (isset($_GET['action']))
	{
		$controller = $_GET['action'];
	}
	else
	{
		$controller = DEFAULT_CONTROLLER;
	}

	$controller_file = "controller/$controller.php";

	if (!file_exists($controller_file))
	{
		$controller_file = "controller/".DEFAULT_CONTROLLER.".php";
	}

	require($controller_file);
?>


