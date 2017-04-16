<?php
namespace api\modules\v1\models;
use \yii\mongodb\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * User Model
 */
class User extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';
    /**
     * @inheritdoc
     */
    public static function collectionName() {
        return ['yii2db','User'];
    }
    /**
     * set model attributes
     */
    public function attributes()
    {
        return [
            '_id',   
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email',
            'role', 
            'name',
            'dob',
            'country',
            'profession',
            'status',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['role', 'default', 'value' => self::ROLE_USER],
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],
        ];
    }

}
