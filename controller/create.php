<?php


	if (isset($_POST['url']) && isset($_POST['title']))
	{
		$post = R::dispense( 'post' );
		$post->title = $_POST['title'];
		$post->url = $_POST['url'];
		$post->user = $user;
		$post->cat_id = $_POST['cat_id'];
		$post->points = 1;
		$post->time = time();
		$id = R::store( $post );
		redirect();

	}
	else
	{
		error();
	}

?>