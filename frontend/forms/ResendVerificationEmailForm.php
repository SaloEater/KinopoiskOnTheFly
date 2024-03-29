<?php


namespace frontend\forms;

use common\essences\User;
use yii\base\Model;

class ResendVerificationEmailForm extends Model
{
    /**
     * @var string
     */
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\essences\User',
                'filter' => ['status' => User::STATUS_WAIT],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }
}
