<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $documentType
 * @property string $firstName
 * @property string $lastName
 * @property string $company
 * @property string $emailAddress
 * @property string $address
 * @property string $province
 * @property string $country
 * @property string $phone
 * @property string $mobile
 */
class Person extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'person';

    /**
     * @var array
     */
    protected $fillable = ['documentType', 'firstName', 'lastName', 'company', 'emailAddress', 'address', 'province', 'country', 'phone', 'mobile', 'document'];

}
