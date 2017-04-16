<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

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
		return [
		    [
		        'class' => \yii\filters\ContentNegotiator::className(),
		        'only' => ['index', 'view'],
		        'formats' => [
		            'application/json' => \yii\web\Response::FORMAT_JSON,
		        ],
		    ],
		];
	}
	
}


