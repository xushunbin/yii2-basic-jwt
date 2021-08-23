<?php

namespace app\common;

use yii\base\BaseObject;

class AppBase extends BaseObject
{
    /**
     * @var $this
     */
    protected static $_instance = [];

    /**
     * 获取实例
     * @param array $config
     * @return mixed|null|$this
     */
    public static function getInstance(array $config = [])
    {
        $className = get_called_class();
        $key       = md5($className);
        if (empty(self::$_instance[$key])) {
            self::$_instance[$key] = new $className($config);
        }
        return self::$_instance[$key];
    }

    /**
     * 清空实例
     *
     * @return bool
     */
    public static function unsetInstance(): bool
    {
        $className = get_called_class();
        $key       = md5($className);
        if (!empty(self::$_instance[$key])) {
            unset(self::$_instance[$key]);
        }
        return true;
    }

}
