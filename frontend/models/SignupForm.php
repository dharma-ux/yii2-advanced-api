<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    // public $username;
    public $email;
    public $password;
    public $name;
    public $dob;
    public $country;
    public $profession;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // ['username', 'trim'],
            // ['username', 'required'],
            // ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            // ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            //  the name,   dob,  country and profession  are required
            [['name',   'dob',    'country',  'profession'],    'required'],
            [['dob'], 'date', 'format' => 'php:Y-m-d']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'dob' => 'Date of birth',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        // $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->name = $this->name;
        $user->dob = $this->dob;
        $user->country = $this->country;
        $user->profession = $this->profession;
        
        // generate jwt token key
        $payload = array('name'=>$this->name,'email'=>$this->email);
        $token = $user->getJwt();
        $user->setAccessToken($token);

        return $user->save() ? $user : null;
    }
}
