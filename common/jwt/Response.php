<?php

namespace app\common\jwt;

use yii\base\BaseObject;
use yii\base\Event;

/**
 *
 */
class Response extends BaseObject
{

    /**
     * API接口成功影响的code
     */
    const API_CODE_SUCCESS = 200;

    /**
     * API接口失败自定义错误code
     */
    const API_CODE_CUSTOM_ERROR = 0;

    /**
     * @param Event $event
     */
    public static function beforeSend(Event $event)
    {
        /**
         * @var \yii\web\Response $response
         */
        $response = $event->sender;
        if ($response->format === \yii\web\Response::FORMAT_JSON) {
            $httpStatusCode = $response->getStatusCode();
            $code             = $response->data['code'] ?? self::API_CODE_SUCCESS;
            $ret              = [];
            $ret['code']      = intval($code);
            if ($httpStatusCode !== self::API_CODE_SUCCESS) {
                // 接口手动返回错误信息
                $ret['code'] = $httpStatusCode;
            }
            if ($code !== self::API_CODE_SUCCESS) {
                if (isset($response->data['msg']) && $response->data['msg']) {
                    $ret['msg'] = $response->data['msg'];
                } else {
                    $ret['msg'] = $response->data['message'] ?? '系统错误';
                }
                $ret['data'] = [];
            } else {
                $ret['msg']  = $response->data['msg'] ?? '请求成功';
                $ret['data'] = $response->data['data'] ?? [];
            }
            $response->data = $ret;
            $response->setStatusCode(self::API_CODE_SUCCESS);
        }
    }

}
