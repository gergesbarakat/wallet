<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactions = DB::table('transactions')->where('wallet_id',$request->wallet_id)->orderBy('created_at','DESC')->get();
        return json_encode($transactions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request)
    {
        $request->validate([
            'transaction_amount'=>'numeric|required',
            'transaction_type' => 'required|min:4|max:6',
            'wallet_id' => 'required|min:1|numeric',
            'transaction_category' => 'required|min:4',
            'transaction_describtion' => 'required|min:4'

        ]);
        $transaction = Transaction::create([
            'amount' => $request->transaction_amount,
            'type' => $request->transaction_type,
            'wallet_id' => $request->wallet_id,
            'category' => $request->transaction_category,
            'describtion' => $request->transaction_describtion

        ]);
        $wallet = Wallet::find($request->wallet_id);

        if($transaction->type == 'credit'){
            if(($wallet->balance - $request->transaction_amount) < 0 ){
                return redirect()->back()->with('error','wallet balance is not enough');
            }else{
                DB::table('wallets')->where('id',[$request->wallet_id])->update([
                    'balance' => ($wallet->balance - $request->transaction_amount),
                ]);
                return redirect()->back()->with('success','transaction made');

            }
        }elseif($transaction->type == 'debit'){
            DB::table('wallets')->where('id',[$request->wallet_id])->update([
                'balance' => ($wallet->balance + $request->transaction_amount),
            ]);
            return redirect()->back()->with('success','transaction made');

        }

        dd($wallet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
