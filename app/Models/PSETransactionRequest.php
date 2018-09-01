<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PSETransactionRequest extends Model
{
    /**
     * @var string
     */
    private $bankCode;
    /**
     * @var string
     */
    private $bankInterface;
    /**
     * @var string
     */
    private $returnURL;
    /**
     * @var string
     */
    private $reference;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $language;
    /**
     * @var string
     */
    private $currency;
    /**
     * @var double
     */
    private $totalAmount;
    /**
     * @var double
     */
    private $taxAmount;
    /**
     * @var double
     */
    private $devolutionBase;
    /**
     * @var double
     */
    private $tipAmount;

    /**
     * @var Person
     */
    private $payer;

    /**
     * @var Person
     */
    private $buyer;

    /**
     * @var Person
     */
    private $shipping;

    /**
     * @var string
     */
    private $ipAddress;
    /**
     * @var string
     */
    private $userAgent;
    /**
     * @var array
     */
    private $additionalData;

    /**
     * PSETransactionRequest constructor.
     * @param string $bankCode
     * @param string $bankInterface
     * @param string $returnURL
     * @param string $reference
     * @param string $description
     * @param string $language
     * @param string $currency
     * @param float $totalAmount
     * @param float $taxAmount
     * @param float $devolutionBase
     * @param float $tipAmount
     * @param Person $payer
     * @param Person $buyer
     * @param Person $shipping
     * @param string $ipAddress
     * @param string $userAgent
     * @param array $additionalData
     */
    public function __construct(string $bankCode, string $bankInterface, string $returnURL, string $reference, string $description, string $language, string $currency, float $totalAmount, float $taxAmount, float $devolutionBase, float $tipAmount, Person $payer, Person $buyer, Person $shipping, string $ipAddress, string $userAgent, array $additionalData)
    {
        $this->bankCode = $bankCode;
        $this->bankInterface = $bankInterface;
        $this->returnURL = $returnURL;
        $this->reference = $reference;
        $this->description = $description;
        $this->language = $language;
        $this->currency = $currency;
        $this->totalAmount = $totalAmount;
        $this->taxAmount = $taxAmount;
        $this->devolutionBase = $devolutionBase;
        $this->tipAmount = $tipAmount;
        $this->payer = $payer;
        $this->buyer = $buyer;
        $this->shippingz = $shipping;
        $this->ipAddress = $ipAddress;
        $this->userAgent = $userAgent;
        $this->additionalData = $additionalData;
    }


}
