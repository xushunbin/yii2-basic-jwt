<?php

namespace app\controllers;

class SiteController extends base\AuthController
{
    public function actionLogin()
    {
        return $this->returnJsonSucc();

    }

    public function actionError()
    {
        return $this->returnJsonFail();
    }
}
