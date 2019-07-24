<?php


namespace services\auth;


use common\essences\User;
use common\repositories\UserRepository;
use common\services\MailService;
use frontend\forms\SignupForm;
use Yii;

class SignUpService
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function signUp(SignupForm $form)
    {
        $user = new User();
        $user->username = $form->username;
        $user->email = $form->email;
        $user->setPassword($form->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        Yii::createObject(MailService::class);

        Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();

        $user->save();
        return $user;
    }


}