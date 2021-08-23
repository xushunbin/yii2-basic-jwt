<?php

namespace app\controllers\base;

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
    public function returnJsonSucc( $data = [], $msg = '请求成功', $code = \app\common\jwt\Response::API_CODE_SUCCESS)
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
    public function returnJsonFail($msg = '请求失败', $data = [], $code = \app\common\jwt\Response::API_CODE_CUSTOM_ERROR)
    {
        return $this->asJson([
            'code' => $code,
            'msg'  => $msg,
            'data' => $data,
        ]);
    }

}
