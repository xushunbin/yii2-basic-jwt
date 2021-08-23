<?php

namespace app\common\jwt;

use app\common\AppBase;
use Lcobucci\JWT\Token;

/**
 * @property $alg
 * @property $expire
 * @property $uid
 * @property $identifiedBy
 */
class Jwt extends AppBase
{
    /**
     * 加密算法
     *
     * @var string
     */
    public $alg = 'HS256';

    /**
     * 有效时间
     *
     * @var int
     */
    public $expire = 7200;

    /**
     * @var int
     */
    public $uid = 0;

    public $identifiedBy = '6Nd5O3PwG7qkaOvE';

    /**
     * Jwt constructor.
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * @return Token
     */
    public function generateToken()
    {
        $jwt    = Yii::$app->jwt;
        $singer = $jwt->getSigner('HS256');
        $key    = $jwt->getKey();
        $time   = time();
        return $jwt->getBuilder()
            ->identifiedBy($this->identifiedBy, true)
            ->issuedAt($time)
            ->expiresAt($time + intval($this->expire))
            ->withClaim('uid', $this->uid)
            ->getToken($singer, $key);
    }

}
