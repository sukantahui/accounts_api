<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function saveTransaction(Request $request){
        $input=(object)($request->json()->all());

        $transaction= new Transaction();
        $transaction->transaction_date = $input->transaction_date;
        $transaction->ledger_id = $input->ledger_id;
        $transaction->asset_id = $input->asset_id;
        $transaction->voucher_number = $input->voucher_number;
        $transaction->amount = $input->amount;
        $transaction->voucher_id = $input->voucher_id;
        $transaction->particulars = $input->particulars;
        $transaction->user_id = $input->user_id;
        $transaction->save();

        return response()->json(['success'=>1,'data'=>$transaction], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getIncomeTransactions()
    {
        $result = Transaction::join('ledgers','transactions.ledger_id','ledgers.id')
            ->join('assets','transactions.asset_id','assets.id')
            ->select('transactions.transaction_date','ledgers.ledger_name','assets.assets_name','transactions.amount')
            ->where('transactions.voucher_id','=',1)
            ->get();
        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
