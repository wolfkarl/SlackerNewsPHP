<?php


	if (isset($_POST['name']) && isset($_POST['password']))
	{

		// check if users exists
		$user = R::findOne( 'user', ' name = ? ', [$_POST['name']] );
			var_dump($user);
		if ($user)
		{
			if ($user->password == slackerhash($_POST['password']))
			{
				$_SESSION['user'] = $user;
				header('Location: .');
			}
			else
			{
				error();
			}
		}
		else // Neuer User
		{
			$user = R::dispense( 'user' );
			$user->name = $_POST['name'];
			$user->password = slackerhash($_POST['password']);
			$id = R::store( $user );
			$_SESSION['user'] = $user;
			header('Location: .');
		}


	}
	else
	{
		error();
	}

	function error()
	{
		header('Location: error.htm');
		exit();
	}

?>