<?php
namespace frontend\services;


use common\services\MailService;
use DomainException;
use frontend\forms\ContactForm;
use Yii;

class ContactService
{
    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param ContactForm $form
     * @throws DomainException
     */
    public function sendEmail(ContactForm $form)
    {
        Yii::createObject(MailService::class)->sendEmail(
            Yii::$app->params['adminEmail'],
            [Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']],
            [$form->email => $form->name],
            $form->subject,
            $form->body
        );
    }
}