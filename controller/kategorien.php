<?php

	$cats =  R::findAll( 'cat');

	$params['cats'] = $cats;

	$template = $twig->loadTemplate('kategorien.twig');
	echo $template->render($params);

?>