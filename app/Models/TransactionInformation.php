<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $transactionID
 * @property string $sessionID
 * @property string $reference
 * @property string $requestDate
 * @property string $bankProcessDate
 * @property boolean $onTest
 * @property string $returnCode
 * @property string $trazabilityCode
 * @property int $transactionCycle
 * @property string $trazabilityState
 * @property int $responseCode
 * @property string $responseReasonCode
 * @property string $responseReasonText
 * @property string $created_at
 * @property string $updated_at
 */
class TransactionInformation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'transaction_information';

    /**
     * @var array
     */
    protected $fillable = ['transactionID', 'sessionID', 'reference', 'requestDate', 'bankProcessDate', 'onTest', 'returnCode', 'trazabilityCode', 'transactionCycle', 'trazabilityState', 'responseCode', 'responseReasonCode', 'responseReasonText', 'created_at', 'updated_at'];

}
