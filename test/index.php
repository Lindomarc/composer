<?php
	require __DIR__ . '/vendor/autoload.php';
	

	use Notification\Email\Email;
	

	$newEmail = new Email;
	$data = [
		'subject' => 'Test',
		'body' => '<p>This is just a test</p>',
		'replayEmail' => 'replayemail@exemple.com',
		'replayName' => 'Replay Name',
		'addAddressEmail' => 'addaddress@exemple.com',
		'addAddressName' => 'AddAddress Name',
		'fromEmail' => 'from@exemple.com',
		'fromName' => 'From Name',
	];
	$newEmail->sendEmail($data);