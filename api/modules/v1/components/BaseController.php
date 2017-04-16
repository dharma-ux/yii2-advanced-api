<?php 
namespace api\modules\v1\components;

use yii\rest\ActiveController;
use sizeg\jwt\JwtHttpBearerAuth;

class BaseController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => JwtHttpBearerAuth::className()
        ];
        
        return $behaviors;
    }
} 