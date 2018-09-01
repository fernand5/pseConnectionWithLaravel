<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $entityCode
 * @property string $serviceCode
 * @property string $amountCode
 * @property string $taxValue
 * @property string $description
 */
class CreditConcept extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['entityCode', 'serviceCode', 'amountValue', 'taxValue', 'description'];

}
