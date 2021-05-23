<?php
	
	namespace Notification\Email;
	
	use PHPMailer\PHPMailer\PHPMailer;
	
	class Email
	{
		private $mail;
		
		public function __construct()
		{
			$this->mail = new PHPMailer(true);
			$this->mail->SMTPDebug = SMTPDebug;
			$this->mail->isSMTP();
			$this->mail->Host = MAIL_HOST;
			$this->mail->SMTPAuth = true;
			$this->mail->Username = MAIL_USERNAME;
			$this->mail->Password = MAIL_PASSWORD;
			$this->mail->SMTPSecure = MAIL_ENCRYPTION;
			$this->mail->Port = MAIL_PORT;
			$this->mail->CharSet = 'utf-8';
			$this->mail->setLanguage('br');
			$this->mail->isHTML();
			$this->mail->setFrom('test@exemple.com','Name Test');
		}
		
		public function sendEmail(array $data)
		{
			$this->mail->Subject = $data['subject'];
			$this->mail->Body = $data['body'];
			$this->mail->addReplyTo($data['replayEmail'],$data['replayName']);
			$this->mail->addAddress($data['addAddressEmail'],$data['addAddressName']);
			try {
				$this->mail->send();
				echo "E-email enviado!.";
				
			} catch (\Exception $exception){
				echo "Error send mail:{$this->mail->ErrorInfo} {$exception->getMessage()}";
			}
		}
	}