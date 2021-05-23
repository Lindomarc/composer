<?php
	
	namespace Notification\Email;
	
	use PHPMailer\PHPMailer\PHPMailer;
	
	class Email
	{
		private $mail;
		private $config;
		
		public function __construct()
		{
			$this->loadConfig();

			$this->mail = new PHPMailer(true);			
			$this->mail->SMTPDebug = $this->config->SMTPDebug;
			$this->mail->isSMTP();
			$this->mail->Host = $this->config->MAIL_HOST;
			$this->mail->SMTPAuth = true;
			$this->mail->Username = $this->config->MAIL_USERNAME;
			$this->mail->Password = $this->config->MAIL_PASSWORD;
			$this->mail->SMTPSecure = $this->config->MAIL_ENCRYPTION;
			$this->mail->Port = $this->config->MAIL_PORT;
			$this->mail->CharSet = 'utf-8';
			$this->mail->setLanguage('br');
			$this->mail->isHTML();
		}

		private function loadConfig()
		{
			$vendorDir = dirname(dirname(__FILE__));
			$baseDir = dirname(dirname(dirname($vendorDir)));			
			$file = $baseDir.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config_mail.json';
						 
			if(file_exists($file)) {
				$this->config = json_decode(file_get_contents($file));
			} else {
				echo "<p>Not Found config file:</p>";
				echo "<p>{$file}</p>";
				die();
			}
		}
		
		public function sendEmail(array $data)
		{
			$this->mail->Subject = $data['subject'];
			$this->mail->Body = $data['body'];
			$this->mail->addReplyTo($data['replayEmail'],$data['replayName']);
			$this->mail->addAddress($data['addAddressEmail'],$data['addAddressName']);
			$this->mail->setFrom($data['fromEmail'],$data['fromName']);
			try {
				$this->mail->send();
				echo "E-email enviado!.";
				
			} catch (\Exception $exception){
				echo "Error send mail:{$this->mail->ErrorInfo} {$exception->getMessage()}";
			}
		}
	}