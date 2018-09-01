<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $transactionID
 * @property string $sessionID
 * @property string $returnCode
 * @property string $trazabilityCode
 * @property int $transactionCycle
 * @property string $bankCurrency
 * @property float $bankFactor
 * @property string $bankURL
 * @property int $responseCode
 * @property string $responseReasonCode
 * @property string $responseReasonText
 * @property string $created_at
 * @property string $updated_at
 */
class PSETransactionResponse extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pse_transaction_response';

    /**
     * @var array
     */
    protected $fillable = ['transactionID', 'sessionID', 'returnCode', 'trazabilityCode', 'transactionCycle', 'bankCurrency', 'bankFactor', 'bankURL', 'responseCode', 'responseReasonCode', 'responseReasonText', 'created_at', 'updated_at'];

    public function transactionInfo()
    {
        return $this->hasOne('App\Models\TransactionInformation', 'transactionID', 'transactionID');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Person', 'userId', 'id');
    }

}
