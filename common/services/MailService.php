<?php

namespace common\services;


use DomainException;
use Yii;

class MailService
{
    /**
     * @param $to string|array
     * @param $from string|array
     * @param $replyTo string|array
     * @param $subject string
     * @param $body string
     */
    public function sendEmail(
        $to,
        $from,
        $replyTo,
        $subject,
        $body
    )
    {
        $mail = Yii::$app->mailer
            ->compose()
            ->setTo($to)
            ->setFrom($from)
            ->setReplyTo($replyTo)
            ->setSubject($subject)
            ->setTextBody($body);
        if (!$mail->send()) {
            throw new DomainException('Ошибка при отправке письма');
        }
    }
}