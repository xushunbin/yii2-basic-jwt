<?php

namespace app\controllers\api;


use app\controllers\base\AuthController;
use yii\web\Response;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends AuthController
{

    //public function index(): Response
    //{
    //    return $this->returnJsonSucc(['id' => 1]);
    //}

    /**
     * @return Response
     */
    public function actionIndex(): Response
    {
        return $this->returnJsonSucc(['id' => 100]);
    }

    /**
     * @return Response
     */
    public function actionLogin()
    {
        return $this->returnJsonSucc();

    }

    public function actionError()
    {
        return $this->returnJsonFail();
    }
}
