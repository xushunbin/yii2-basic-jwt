<?php

namespace app\controllers\base;

use app\common\base\AppResponse;
use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    /**
     * @param array $data
     * @param string $msg
     * @param int $code
     *
     * @return Response
     */
    public function returnJsonSucc( array $data = [], string $msg = '请求成功', int $code = AppResponse::API_CODE_SUCCESS): Response
    {
        return $this->asJson([
            'code' => $code,
            'msg'  => $msg,
            'data' => $data,
        ]);
    }
    /**
     * @param string $msg
     * @param array $data
     * @param int $code
     *
     * @return Response
     */
    public function returnJsonFail(string $msg = '请求失败', array $data = [], int $code = AppResponse::API_CODE_CUSTOM_ERROR): Response
    {
        return $this->asJson([
            'code' => $code,
            'msg'  => $msg,
            'data' => $data,
        ]);
    }

}
