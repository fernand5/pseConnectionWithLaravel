<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank
{
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $name;
    public function __construct($bankCode, $bankName)
    {
        $this->code = $bankCode;
        $this->name = $bankName;
    }
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
