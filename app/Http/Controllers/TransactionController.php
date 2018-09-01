<?php

namespace App\Http\Controllers;

use App\Jobs\GetTransactionInformation;
use App\Models\Authentication;
use App\Models\Person;
use App\Models\PSE;
use App\Models\PSETransactionResponse;
use Illuminate\Http\Request;
use SoapClient;
use Webpatser\Uuid\Uuid;
use Log;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pse = new PSE();

        $banks = $pse->getBankList();

        $columns = array('Transaction ID', 'Estado', 'Emitida por', 'Correo');

        $transactions = PSETransactionResponse::all();

        return view('create', [
            'banks' => $banks,
            'columns' => $columns,
            'transactions' => $transactions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $pse = new PSE();

        $person = Person::updateOrCreate(['emailAddress' => $request->emailAddress], $request->all());


        $transaction = $pse->createTransaction(
            $request,
            request()->ip(),
            $person
        );

        if (isset($transaction->createTransactionResult) && $transaction->createTransactionResult->returnCode == 'SUCCESS') {

            //JOB for monitor after 7 minutes
            GetTransactionInformation::dispatch($transaction->createTransactionResult->transactionID)
            ->delay(now()->addMinutes(1));

            //Save response information
            $pseTransactionResponse = new PSETransactionResponse();
            $pseTransactionResponse->fill((array)$transaction->createTransactionResult);
            $pseTransactionResponse->userId = $person->id;
            $pseTransactionResponse->save();

            return redirect()->to($transaction->createTransactionResult->bankURL);
        } else if (!is_array($transaction)) {
            Session::flash('message', $transaction);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->to('transaction/create');
        }



//        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
