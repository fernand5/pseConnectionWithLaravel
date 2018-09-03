<?php

namespace App\Jobs;

use App\Models\TransactionInformation;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\PSE;
use Log;

class GetTransactionInformation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $transactionID;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tranactionID)
    {
        $this->transactionID = $tranactionID;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pse = new PSE();
        $data = $pse->getTransactionInformation($this->transactionID);

        $transactionInformation = new TransactionInformation();
        $transactionInformation->fill((array)$data->getTransactionInformationResult);
        $transactionInformation->save();

        if ($transactionInformation->responseCode == 3){
            GetTransactionInformation::dispatch($transactionInformation->transactionID)
                ->delay(now()->addMinutes(10));
            Log::debug('Still pending');
        }
        Log::debug('Job passed');
        Log::debug(serialize($data));
    }
}
