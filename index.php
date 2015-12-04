<?php

	$start = microtime(true);

	require('lib/rb.php'); // RedBean ORM
	R::setup( 'sqlite:data/slacker.db');


	// $post = R::dispense( 'post' );
	// $post->title = 'Farid Bang erzählt einen Witz';
	// $post->url = 'https://www.youtube.com/watch?v=ISjOz5UnuRc';
	// $post->user_id = 1;
	// $post->cat_id = 1;
	// $post->points = 1;
	// $post->time = time();
	// $id = R::store( $post );

	$posts = R::find('post');


?>

<h1>SlackerNews</h1>


<?php foreach ($posts as $post): ?>

	<div class="post">
	<p><a href="<?php echo $post->url ?>"><?php echo $post->title ?></a> (<?php echo $post->points ?>)<br>
	<?php echo date('d.m.Y H:i', $post->time) ?></p>
	</div>

<?php endforeach ?>

<hr>

<?php 

	$end = microtime(true);
	printf("Page was generated in %f seconds", $end - $start);
 ?>
