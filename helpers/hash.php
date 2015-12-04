<?php

	define('SALT', 'c0e81794384491161f1777c232bc6bd9ec38f616560b120fda8e90f383853542');

	function slackerhash($plain)
	{
		return hash('sha256', $plain.SALT);
	}

?>