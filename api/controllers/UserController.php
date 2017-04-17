<?php
namespace api\controllers;

use Yii;
use api\components\ApiController;

use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

use yii\filters\ContentNegotiator;
use yii\web\Response;
/**
 * Site controller
 */
class UserController extends ApiController
{
    public $modelClass = 'api\models\User';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];


    // public function actions()
    // {
    //     $actions = parent::actions();
    //     unset($actions['index']);
    //     return $actions;
    // }

    /**
     * @Note: By default OPTIONS not need to be authorized, if any action not need authorization include inside array
     * Header: Authorization , Value: Bearer <auth_key> (need space between Bearer and auth_key)
     * $guestActions : array of action which will not execute HttpBearerAuth
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $action = Yii::$app->requestedAction->id;
        $guestActions = [];
        if (!in_array($action, $guestActions)&&(Yii::$app->request->method!='OPTIONS')) {
            $behaviors['authenticator'] = [
                'class' => HttpBearerAuth::className(),
            ];
        }
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }


}
