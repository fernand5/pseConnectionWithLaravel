<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Webpatser\Uuid\Uuid;
//use App\Models\Authentication;

class PSE extends Model
{
    /**
     * PSE constructor.
     *
     */
    public function __construct()
    {

    }
    /**
     * @return Bank[]
     */
    public function getBankList()
    {
        $banks = [];


        $value = Cache::remember('banks', 1440, function () {
            $client = new \SoapClient(env('WSDL'), [
                'exceptions' => true,
                'trace' => 1
            ]);  // The trace param will show you errors stack
            // web service input params
            $auth = new Authentication('6dd490faf9cb87a9862245da41170ff2', '024h1IlD');
            try {
                return $client->getBankList(array('auth'=>$auth));;
            }
            catch (\SoapFault $e) {
                return $e->getMessage();
            }
        });


        if (is_array($value->getBankListResult->item)) {

            foreach ($value->getBankListResult->item as $bank) {
                array_push($banks, new Bank($bank->bankCode, $bank->bankName));
            }
            return $banks;
        } else {
            return $value;
        }




    }
    /**
     * @return transaction
     */
    public function createTransaction($valuesPerson, $ip, $person)
    {

        $transactionRequest = new PSETransactionRequest(
            $valuesPerson->bank,
            $valuesPerson->bankInterface,
            'http://localhost:8000/transaction/create',
            '123456',
            'testing',
            'es',
            'COP',
            5000,
            10,
            1,
            100,
            $person,
            $person,
            $person,
            $ip,
            'test',
            []
        );

        try {
            $client = new \SoapClient(env('WSDL'), array('exceptions' => true));  // The trace param will show you errors stack
            // web service input params
            $auth = new Authentication(env('LOGIN_PSE'), env('TRANSKEY'));
            return $client->createTransaction(array('auth'=>$auth,'transaction'=>$transactionRequest));
        }
        catch (\SoapFault $e) {
            return $e->getMessage();
        }

    }
    /**
     * @return transaction
     */
    public function getTransactionInformation($transactionID)
    {
        try {
            $client = new \SoapClient(env('WSDL'), array('exceptions' => true));  // The trace param will show you errors stack
            // web service input params
            $auth = new Authentication(env('LOGIN_PSE'), env('TRANSKEY'));
            return $client->getTransactionInformation(array('auth'=>$auth,'transactionID'=>$transactionID));
        }
        catch (\SoapFault $e) {
            return $e->getMessage();
        }
    }
}
