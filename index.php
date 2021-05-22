<?php
	ini_set('display_errors', 1);
	
	require __DIR__ . '/_app/config.php';
	require __DIR__ . '/lib_ext/autoload.php';
	
	
	use Notification\Email\Email;
	
	$newEmail = new Email;
	
	$newEmail->sendEmail();
	
	exit;