<?php

namespace App\Http\Controllers;

use App\Model\Ledger;
use App\Model\LedgerType;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIncomes()
    {
        $incomes=LedgerType::find(1)->ledgers->where('inforce','=',1);
        return response()->json(['success'=>1,'data'=>$incomes], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getExpenditures()
    {
        $expenditures=LedgerType::find(2)->ledgers->where('inforce','=',1);
        return response()->json(['success'=>1,'data'=>$expenditures], 200,[],JSON_NUMERIC_CHECK);
    }

    public function create(Request $request)
    {
        $input=(object)($request->json()->all());
        $ledger= new Ledger();
        $ledger->ledger_type_id=$input->ledger_type_id;
        $ledger->ledger_name=$input->ledger_name;
        $ledger->save();
        return response()->json(['success'=>1,'data'=>$ledger], 200,[],JSON_NUMERIC_CHECK);
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Ledger $ledger)
    {
        //
    }
    public function edit(Ledger $ledger)
    {
        //
    }
    public function update(Request $request, Ledger $ledger)
    {
        //
    }
    public function destroy(Ledger $ledger)
    {
        //
    }
}
