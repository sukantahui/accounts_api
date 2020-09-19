<?php

namespace App\Http\Controllers;

use App\Model\CustomVoucher;
use App\Model\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function saveIncomeTransaction(Request $request){
        $input=(object)($request->json()->all());
        DB::beginTransaction();
        try {
            $temp_date = explode("-", $input->transaction_date);
            $accounting_year = "";
            if ($temp_date[1] > 3) {
                $x = $temp_date[0] % 100;
                $accounting_year = $x * 100 + ($x + 1);
            } else {
                $x = $temp_date[0] % 100;
                $accounting_year = ($x - 1) * 100 + $x;
            }

            $customVoucher = CustomVoucher::where('voucher_name', "Income")->Where('accounting_year', $accounting_year)->first();

            if ($customVoucher) {
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            } else {
                $customVoucher = new CustomVoucher();
                $customVoucher->voucher_name = "Income";
                $customVoucher->accounting_year = $accounting_year;
                $customVoucher->last_counter = 1;
                $customVoucher->delimiter = '-';
                $customVoucher->prefix = 'INC';
                $customVoucher->save();
            }
            $transaction_number = $customVoucher->prefix
                . $customVoucher->delimiter
                . str_pad($customVoucher->last_counter, 6, '0', STR_PAD_LEFT)
                . $customVoucher->delimiter
                . $customVoucher->accounting_year;
            $transaction = new Transaction();
            $transaction->transaction_date = $input->transaction_date;
            $transaction->transaction_number = $transaction_number;
            $transaction->ledger_id = $input->ledger_id;
            $transaction->asset_id = $input->asset_id;
            $transaction->voucher_number = $input->voucher_number;
            $transaction->amount = $input->amount;
            $transaction->voucher_id = $input->voucher_id;
            $transaction->particulars = $input->particulars;
            $transaction->user_id = $input->user_id;
            $transaction->save();
            DB::commit();
            $result = Transaction::join('ledgers', 'transactions.ledger_id', 'ledgers.id')
                ->join('assets', 'transactions.asset_id', 'assets.id')
                ->select('transactions.id', 'transactions.transaction_date','transactions.transaction_number', DB::raw("date_format(transaction_date,'%D %M %Y') as formatted_date"), 'transactions.ledger_id', 'ledgers.ledger_name', 'transactions.asset_id', 'assets.assets_name', 'transactions.voucher_number', 'transactions.voucher_id', 'transactions.particulars', 'transactions.user_id', 'transactions.amount')
                ->where('transactions.voucher_id', '=', 1)->where('transactions.id', '=', $transaction->id)
                ->first();
            return response()->json(['success' => 1, 'data' => $result, 'error' => null], 200, [], JSON_NUMERIC_CHECK);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return response()->json(['success'=>0,'data'=>null, 'error'=>$e], 401,[],JSON_NUMERIC_CHECK);
        }

    }
    public function getIncomeTransactions()
    {
        $result = Transaction::join('ledgers','transactions.ledger_id','ledgers.id')
            ->join('assets','transactions.asset_id','assets.id')
            ->select('transactions.id','transactions.transaction_date','transactions.transaction_number',DB::raw("date_format(transaction_date,'%D %M %Y') as formatted_date"),'transactions.ledger_id','ledgers.ledger_name','transactions.asset_id','assets.assets_name','transactions.voucher_number','transactions.voucher_id','transactions.particulars','transactions.user_id','transactions.amount')
            ->where('transactions.voucher_id','=',1)
            ->orderBy('transactions.transaction_date','DESC')
            ->get();
        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }

    public function saveExpenditureTransaction(Request $request){
        $input=(object)($request->json()->all());
        DB::beginTransaction();
        try
        {
            $temp_date = explode("-",$input->transaction_date);
            $accounting_year="";
            if($temp_date[1]>3){
                $x = $temp_date[0]%100;
                $accounting_year = $x*100 + ($x+1);
            }else{
                $x = $temp_date[0]%100;
                $accounting_year =($x-1)*100+$x;
            }

            $customVoucher=CustomVoucher::where('voucher_name',"Expenditure")->Where('accounting_year',$accounting_year)->first();

            if($customVoucher) {
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name="Expenditure";
                $customVoucher->accounting_year=$accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='EXP';
                $customVoucher->save();
            }
            $transaction_number=$customVoucher->prefix
                .$customVoucher->delimiter
                .str_pad($customVoucher->last_counter,6,'0',STR_PAD_LEFT)
                .$customVoucher->delimiter
                .$customVoucher->accounting_year;
            $transaction= new Transaction();
            $transaction->transaction_date = $input->transaction_date;
            $transaction->transaction_number = $transaction_number;
            $transaction->ledger_id = $input->ledger_id;
            $transaction->asset_id = $input->asset_id;
            $transaction->voucher_number = $input->voucher_number;
            $transaction->amount = $input->amount;
            $transaction->voucher_id = $input->voucher_id;
            $transaction->particulars = $input->particulars;
            $transaction->user_id = $input->user_id;
            $transaction->save();
            DB::commit();
            $result = Transaction::join('ledgers','transactions.ledger_id','ledgers.id')
                ->join('assets','transactions.asset_id','assets.id')
                ->select('transactions.id','transactions.transaction_date','transactions.transaction_number',DB::raw("date_format(transaction_date,'%D %M %Y') as formatted_date"),'transactions.ledger_id','ledgers.ledger_name','transactions.asset_id','assets.assets_name','transactions.voucher_number','transactions.voucher_id','transactions.particulars','transactions.user_id','transactions.amount')
                ->where('transactions.voucher_id','=',2)->where('transactions.id','=',$transaction->id)
                ->first();
            return response()->json(['success'=>1,'data'=>$result, 'error'=>null], 200,[],JSON_NUMERIC_CHECK);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return response()->json(['success'=>0,'data'=>null, 'error'=>$e], 401,[],JSON_NUMERIC_CHECK);
        }

    }
    public function getExpenditureTransactions()
    {
        $result = Transaction::join('ledgers','transactions.ledger_id','ledgers.id')
            ->join('assets','transactions.asset_id','assets.id')
            ->select('transactions.id','transactions.transaction_date','transactions.transaction_number',DB::raw("date_format(transaction_date,'%D %M %Y') as formatted_date"),'transactions.ledger_id','ledgers.ledger_name','transactions.asset_id','assets.assets_name','transactions.voucher_number','transactions.voucher_id','transactions.particulars','transactions.user_id','transactions.amount')
            ->where('transactions.voucher_id','=',2)
            ->orderBy('transactions.transaction_date','DESC')
            ->get();
        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


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
