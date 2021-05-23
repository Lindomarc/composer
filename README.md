# Notification library via email using phpMailer

This library has the function of sending e-mail using a phpmailer library. Doing this in an uncomplicated way is essential for any system.

To install the library, run the following command:

```sh
composer require lindomar/notification
```

To use the library, simply require the composer to autoload, invoke the class and call the method:

Copy the file ***config_mail.json.exemple*** to ***/config/config_mail.json***

Update with your SMTP server configuration data

```
{ 
	"SMTPDebug" : "2",
	"MAIL_MAILER" : "smtp",
	"MAIL_HOST": "smtp.mailtrap.io",
	"MAIL_PORT": "2525",
	"MAIL_USERNAME": "XXXXXXXXXXXXXX",
	"MAIL_PASSWORD": "XXXXXXXXXXXXXX",
	"MAIL_ENCRYPTION": "tls"
}
```


### Developers
* [Lindomar] - Github
* [phpMailer] - Lib to send E-mail

License
----
MIT

[//]:#
[phpMailer]: <https://github.com/PHPMailer/PHPMailer>
[Lindomar]: <https://github.com/Lindomarc>