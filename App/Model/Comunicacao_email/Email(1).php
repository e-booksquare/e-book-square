<?php

namespace App\Model\Comunicacao_email;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class Email{

    const HOST = 'sandbox.smtp.mailtrap.io';
    const USER = '789ae42c79e412';
    const PASS = 'cba771061dbf38';
    const SECURE = 'TLS';
    const PORT = 2525;
    const CHARSET = 'UTF-8';


    const FROM_EMAIL = 'support@ebooksquare.com';
    const FROM_NAME = 'EBS Enterprise';

    private $error;

    public function getError(){
        return $this->error;
    }

    public function sendEmail($email, $subject, $body, $nome,  $anexos = [], $ccs = [], $bccs = []){

        $this->error = '';

        $obMail = new PHPMailer(true);
        try{

            $obMail->isSMTP(true);
            $obMail->Host = self::HOST;
            $obMail->SMTPAuth = true;
            $obMail->Username = self::USER;
            $obMail->Password = self::PASS;
            $obMail->SMTPSecure = self::SECURE;
            $obMail->Port = self::PORT;
            $obMail->Charset = self::CHARSET;

            $obMail->addAddress(self::FROM_EMAIL, self::FROM_NAME);

            $email = is_array($email) ? $email : [$email];
            foreach($email as $emails){
                $obMail->setFrom($emails, $nome); 
            }
            $anexos = is_array($anexos) ? $anexos : [$anexos];
            foreach($anexos as $anexo){
                $obMail->addAttachment($anexo);
            }
            $ccs = is_array($ccs) ? $ccs : [$ccs];
            foreach($ccs as $cc){
                $obMail->addCC($cc);
            }
            $bccs = is_array($bccs) ? $bccs : [$bccs];
            foreach($bccs as $bcc){
                $obMail->addBCC($bcc);
            }

            $obMail->isHTML(true);
            $obMail->Subject = $subject;
            $obMail->Body = $body;

            return $obMail->send();

        }catch(PHPMailerException $e){
            $this->error = $e->getMessage();
            return false;
        }

    }
}

class EBSEmail{

    const HOST = 'sandbox.smtp.mailtrap.io';
    const USER = '789ae42c79e412';
    const PASS = 'cba771061dbf38';
    const SECURE = 'TLS';
    const PORT = 2525;
    const CHARSET = 'UTF-8';


    const FROM_EMAIL = 'support@ebooksquare.com';
    const FROM_NAME = 'EBS Enterprise';

    private $error;

    public function getError(){
        return $this->error;
    }

    public function sendEmail($email, $subject, $body, $nome,  $anexos = [], $ccs = [], $bccs = []){

        $this->error = '';

        $obMail = new PHPMailer(true);
        try{

            $obMail->isSMTP(true);
            $obMail->Host = self::HOST;
            $obMail->SMTPAuth = true;
            $obMail->Username = self::USER;
            $obMail->Password = self::PASS;
            $obMail->SMTPSecure = self::SECURE;
            $obMail->Port = self::PORT;
            $obMail->Charset = self::CHARSET;

            $obMail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            $email = is_array($email) ? $email : [$email];
            foreach($email as $emails){
                $obMail->setFrom($emails, $nome); 
            }
            $anexos = is_array($anexos) ? $anexos : [$anexos];
            foreach($anexos as $anexo){
                $obMail->addAttachment($anexo);
            }
            $ccs = is_array($ccs) ? $ccs : [$ccs];
            foreach($ccs as $cc){
                $obMail->addCC($cc);
            }
            $bccs = is_array($bccs) ? $bccs : [$bccs];
            foreach($bccs as $bcc){
                $obMail->addBCC($bcc);
            }

            $obMail->isHTML(true);
            $obMail->Subject = $subject;
            $obMail->Body = $body;

            return $obMail->send();

        }catch(PHPMailerException $e){
            $this->error = $e->getMessage();
            return false;
        }

    }
}