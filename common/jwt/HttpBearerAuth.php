<?php

namespace app\common\jwt;

use sizeg\jwt\JwtHttpBearerAuth;
use yii\base\Action;
use yii\helpers\StringHelper;

class HttpBearerAuth extends JwtHttpBearerAuth
{
    /**
     * @param Action $action
     *
     * @return bool
     */
    public function isOptional($action): bool
    {
        $route = '/' . $action->controller->id . '/' . $action->id;
        foreach ($this->optional as $pattern) {
            if (StringHelper::matchWildcard($pattern, $route)) {
                return true;
            }
        }
        return false;
    }
}
