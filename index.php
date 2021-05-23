<?php
	ini_set('display_errors', 1);
	
	require __DIR__ . '/src/config.php';
	require __DIR__ . '/lib_ext/autoload.php';
	
	
	use Notification\Email\Email;
	
	$newEmail = new Email;
	
	$data = [
		'subject' => 'Test',
		'body' => '<p>This is just a test</p>',
		'replayEmail' => 'replayemail@exemple.com',
		'replayName' => 'Replay Name',
		'addAddressEmail' => 'addaddress@exemple.com',
		'addAddressName' => 'AddAddress Name',
	];
	$newEmail->sendEmail($data);
	