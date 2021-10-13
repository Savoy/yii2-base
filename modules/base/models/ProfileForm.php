<?php

namespace app\modules\base\models;

use app\models\User;
use yii\base\Model;
use yii\web\ForbiddenHttpException;

/**
 * Class ProfileForm
 *
 * @package app\modules\clients\models
 */
class ProfileForm extends Model
{
    public $currentPassword;
    public $password;
    public $confirmPassword;

    /**
     * @var User
     */
    private $_user;

    /**
     * ProfileForm constructor.
     *
     * @param int $userId
     *
     * @throws ForbiddenHttpException
     * {@inheritDoc}
     */
    public function __construct(int $userId, $config = [])
    {
        $this->_user = User::findOne($userId);
        if ($this->_user === null) {
            throw new ForbiddenHttpException();
        }
        $this->email = $this->_user->email;

        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['currentPassword'],
                'required',
                'when' => function() {
                    return !empty($this->password);
                },
                'whenClient' => 'function() {
                    return $("#profileform-password").val() != "";
                }',
            ],
            [['password', 'confirmPassword'], 'string', 'min' => 6],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributeLabels()
    {
        return [
            'currentPassword' => 'Текущий пароль',
            'password' => 'Новый пароль',
            'confirmPassword' => 'Подтверждение пароля',
        ];
    }

    /**
     * @return bool
     * @throws \yii\base\Exception
     */
    public function update()
    {
        if (!empty($this->password)) {
            if (!$this->_user->validatePassword($this->currentPassword)) {
                $this->addError('currentPassword', 'Неверно указан текущий пароль.');

                return false;
            }
            $this->_user->setPassword($this->password);
        }

        return $this->_user->save();
    }
}
