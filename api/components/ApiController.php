<?php
/**
 * Created by PhpStorm.
 * User: francis
 * Date: 27/04/15
 * Time: 5:48 PM
 */

namespace api\components;
use Yii;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter']=  [
            'class' => \yii\filters\Cors::className(),
            /*'cors' => [
                'Origin' => ['http://localhost'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
//                'Access-Control-Expose-Headers' => ['Location']
            ]*/
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['create'] = [
            'class' => 'api\components\CreateActionNR',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'scenario' => $this->createScenario,
        ];
        return $actions;
    }
}