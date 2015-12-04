<?php


	if (isset($_POST['name']) )
	{
		$cat = R::dispense( 'cat' );
		$cat->name = $_POST['name'];
		$cat->desc = $_POST['desc'];
		$cat->user = $user;
		$id = R::store( $cat );
		redirect();

	}
	else
	{
		error();
	}

?>