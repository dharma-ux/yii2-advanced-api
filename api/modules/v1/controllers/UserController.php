<?php

namespace api\modules\v1\controllers;

use common\models\User;
use Yii;
use api\modules\v1\components\BaseController;

use yii\rest\ActiveController;

use yii\filters\ContentNegotiator;
use yii\web\Response;

/**
 * 	User Controller API
	
	With just this little effort, your user API include

	GET /users: list all users
	HEAD /users: show the overview information of user listing
	POST /users: create a new user
	GET /users/1: return the details of the user 1
	HEAD /users/1: show the overview information of user 1
	PATCH /users/1: update the user 1
	PUT /users/1: update the user 1
	DELETE /users/1: delete the user 1
	OPTIONS /users: show the supported verbs regarding endpoint /users
	OPTIONS /users/1: show the supported verbs regarding endpoint /users/1.
 */

class UserController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\User';    

	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        /*$behaviors['access'] = [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['options'],
                    'roles' => ['?']
                ],
                [
                    'allow' => true,
                    'actions' => ['index', 'view', 'me'],
                    'roles' => ['@']
                ],
                [
                    'allow' => true,
                    'actions' => ['update', 'create', 'delete'],
                    'roles' => ['admin']
                ]
            ]
        ];*/
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        $behaviors['verbFilter']['actions']['me'] = [
            'GET',
            'HEAD'
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        return $actions;
    }

    /**
     * @return array|null|\app\models\User
     */
    public function actionMe()
    {
        return User::find()->where(['id' => Yii::$app->user->id])->one();
    }
	
}


