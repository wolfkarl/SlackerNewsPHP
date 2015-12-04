<?php

	$posts =  R::findAll( 'post' , ' ORDER BY time DESC LIMIT 100' );


	// fuck lazy loading
	foreach ($posts as $post)
	{
		$post->user;
	}


	$params['posts'] = $posts;
	$params['session'] = $_SESSION;


	$template = $twig->loadTemplate('latest.twig');
	echo $template->render($params);

?>