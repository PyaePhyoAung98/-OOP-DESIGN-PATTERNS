<?php
interface Mailer 
{
    function sendMail($message);
  
}
class MailchimpMailer implements Mailer
{
    public function sendMail($message)
    {
        echo("Mailchimp email => " . $message . "<br/>");
    }
}
class MailgunMailer implements Mailer
{
    public function sendMail($message)
    {
        echo ("Mailgun email => " . $message . "<br/>");
    }
}

abstract class MailerFactory
{
    abstract function mailDriver();
}
class MailchimpFactory extends MailerFactory
{
    public function mailDriver()
    {
        return new MailchimpMailer();
    }
}
class MailgunFactory extends MailerFactory
{
    public function mailDriver()
    {
        return new MailgunMailer();
    }
}

//Client code 
$client = new MailchimpFactory();
$client->mailDriver()->sendmail("This is from Mailchimp");
$client = new MailgunFactory();
$client->mailDriver()->sendmail("This is from mailgun");
