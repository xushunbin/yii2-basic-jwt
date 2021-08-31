<?php

namespace app\controllers\base;

use app\common\jwt\HttpBearerAuth;
use common\components\jwt\JwtHttpBearerAuth;
use yii\filters\Cors;

class AuthController extends BaseController
{

    /**
     * jwt 验证
     *
     * @return array|array[]
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        if (YII_ENV_LOCAL) {
            $behaviors['corsFilter'] = [
                'class' => Cors::class,
                'cors'  => [
                    'Origin'                           => ['http://localhost:9528', 'http://localhost:9528/'],
                    'Access-Control-Request-Method'    => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers'   => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 86400,
                    'Access-Control-Expose-Headers'    => [],
                ],
            ];
        }
        $behaviors['authenticator'] = [
            'class'    => HttpBearerAuth::class,
            'optional' => [
                '/site/login',
            ],
        ];
        return $behaviors;
    }

}
