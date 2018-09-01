<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Authentication.
 *
 * @property string $login
 * @property string $tranKey
 * @property string $plainTranKey
 * @property string $seed
 * @property ArrayOfAttribute $additional
 */
class Authentication
{
    /**
     * @var string
     */
    private $login;
    /**
     * @var string
     */
    private $tranKey;
    /**
     * @var string
     */
    private $plainTranKey;
    /**
     * @var string
     */
    private $seed;
    /**
     * @var ArrayOfAttribute
     */
    private $additional;
    /**
     * Authentication constructor.
     *
     * @param string           $login
     * @param string           $tranKey
     * @param ArrayOfAttribute $additional
     */
    public function __construct($login, $tranKey, ArrayOfAttribute $additional = null)
    {
        $this->login = $login;
        $this->seed = date('c');
        $this->tranKey = $this->generateHashKey($tranKey);
//        $this->plainTranKey = $tranKey;
//        if ($additional) {
//            $this->additional = $additional;
//        }
    }
    /**
     * @param string $tranKey
     *
     * @return string
     */
    private function generateHashKey($tranKey)
    {
        return sha1($this->seed.$tranKey, false);
    }
    /**
     * @return string
     */
    protected function getLogin()
    {
        return $this->login;
    }
    /**
     * @return string
     */
    protected function getTranKey()
    {
        return $this->tranKey;
    }
    /**
     * @return string
     */
    protected function getPlainTranKey()
    {
        return $this->plainTranKey;
    }
    /**
     * @return string
     */
    protected function getSeed()
    {
        return $this->seed;
    }
    /**
     * @return ArrayOfAttribute
     */
    protected function getAdditional()
    {
        return $this->additional;
    }
}
