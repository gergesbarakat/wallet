<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="  dark:bg-gray-800 h-full max-h-4/6   ">
        <div class="wallet dark:bg-gray-700  ">
            <aside class="lg:p-5  dark:bg-gray-700 w-4/12 h-full  ">
                <div class="h-1/6 flex lg:flex-row justify-between items-center content-center sm:flex-col md:flex-col">
                    <h1 class="sm:w-full dark:text-white items-center content-center justify-center flex h-full sm:text-lg lg:p-5 lg:text-2xl"> My Wallets </h1>
                    <button
                        class="sm:w-full modal-open dark:bg-white dark:text-gray-700 p-2 hover:p-2 rounded px-4 hover:px-4 text-lg hover:text-lg hover:bg-gray-700 hover:text-white border hover:border-white   "
                        onclick="$('.wallet-modal').show();">Add</button>
                </div>
                <div class="h-5/6  overflow-scroll ">
                    <?php
                    $wallets = DB::table('wallets')
                        ->where('user_id', AUTH::user()->id)
                        ->get();
                    ?>

                    @foreach ($wallets as $wallet)
                        <div id="{{ $wallet->id }}" balance="{{ $wallet->balance }}"
                            class="hover:cursor-pointer dark:bg-white hover:bg-gray-300 rounded m-3 p-3 focus-within:shadow-lg  wallet-box {{ $wallet->type }}">
                            <div class="wallet-name py-1 sm:text-xl lg:text-2xl">{{ $wallet->name }}</div>
                            <div class="sm:text-md lg:text-lg   text-gray-500">{{ $wallet->type }} - {{ $wallet->balance }}$</div>
                        </div>
                    @endforeach

                </div>
            </aside>
            <content class="right-trans w-full h-full flex flex-col overflow-scroll">
                <?php
                    $first_wallet = DB::table('wallets')
                    ->where('user_id', AUTH::user()->id)
                    ->take(1)
                    ->get();

                ?>

                @if (count($first_wallet) < 1)
                    SELECT WALLET FIRST
                @else
                    <div class="w-full flex-row h-1/6 flex items-center justify-between flex-col">
                        <h1 class="text-xl"> {{ $first_wallet[0]->name }}$ </h1>
                        <div class="w-full flex items-center justify-between">
                            <h1 class="text-xl">Balance : {{ $first_wallet[0]->balance }}$ </h1>
                            <button
                                class="py-2 px-5 m-2 rounded dark:hover:bg-gray-700 dark:hover:text-white dark:bg-white dark:text-black  text-gray-700 bg-white border border-gray-200"
                                onclick="$('.transaction-modal').show(400)"> Add Transaction </button>

                        </div>

                    </div>
                    <div class="flex flex-col h-4/6 overflow-scroll">
                        <?php

                        $transactions = DB::table('transactions')
                            ->where('wallet_id', $first_wallet[0]->id)
                            ->get();
                        ?>
                        @if (count($first_wallet) < 1)

                            @foreach ($transactions as $transaction)
                                <div class="dark:bg-gray-300 rounded border dark:border-white flex flex-col p-2 m-2">
                                    <div class="transaction-item_details">
                                        <h3>{{ $transaction->category }}</h3><span class="details">Payment
                                            #{{ $transaction->id }} -
                                            {{ explode(' ', $transaction->created_at)[0] }}</span>
                                    </div>
                                    <div class="flex">
                                        <p class="amount"> {{ $transaction->type == 'credit' ? '-' : '+' }}
                                            {{ $transaction->amount }}</p><span>$</span>
                                    </div>
                                    <div class="flex">
                                        <p class="amount">
                                            {{ $transaction->describtion }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            NO TRANSACTIONS YET

                        @endif
                    </div>

                @endif


            </content>
        </div>
    </div>

    <div class="modal wallet-modal">
        <div class="modal-body dark:bg-gray-600">
            <h3>Add a New Card</h3>
            <div class="modal-close" onclick="$('.wallet-modal').hide(400)">x</div>
            <form class="mt-3" action="{{ route('user.wallet.store') }}" method="post">
                @method('POST')
                @csrf



                <label for="wallet_name" class=" text-left w-100 m-6 dark:text-white">Wallet Name</label>
                <input type="text" name="wallet_name"
                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">




                <label for="wallet_type" class=" text-left w-100 m-6 dark:text-white">Wallet Type</label>
                <input type="text" name="wallet_type"
                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">


                <button
                    class="py-2 px-5 m-2 rounded dark:hover:bg-gray-700 dark:hover:text-white dark:bg-white dark:text-black  text-gray-700 bg-white border border-gray-700"
                    onclick="$(this).parent().submit()"> Add </button>

            </form>
        </div>
    </div>
    <div class="modal transaction-modal">
        <div class="modal-body dark:bg-gray-600">
            <h3>Add a New Card</h3>
            <div class="modal-close rounded text-white bg-red-400 py-1 px-2" onclick="$('.transaction-modal').hide(400)">x</div>
            <form class="mt-3" action="{{ route('user.transaction.store') }}" method="post">
                @method('POST')
                @csrf
                <input type="text" class="hidden"   id="wallet_id" name="wallet_id" value="{{ $first_wallet[0]->id }}">


                <label for="transaction_category" class=" text-left w-100 m-6 dark:text-white">Transaction
                    Category</label>
                <input required type="text" name="transaction_category"
                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">

                <label for="transaction_amount" class=" text-left w-100 m-6 dark:text-white">Transaction Amount</label>
                <input required type="text" name="transaction_amount"
                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">



                <div class="">
                    <label for="transaction_type" class=" text-left w-100 pt-5 dark:text-white">Transaction type</label>
                    <select required name="transaction_type" id="transaction_type"
                        class='w-full rounded  p-2 dark:text-white focus:border-none'>

                        <option value="debit">debit</option>
                        <option value="credit">credit</option>

                    </select>

                </div>
                <label for="transaction_describtion" class=" text-left w-100 m-6 dark:text-white">Transaction
                    Describtion</label>
                <input required type="text" name="transaction_describtion"
                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">


                <button
                    class="transaction-submit py-2 px-5 m-2 rounded dark:hover:bg-gray-700 dark:hover:text-white dark:bg-white dark:text-black  text-gray-700 bg-white border border-gray-700">
                    Add </button>

            </form>
        </div>
    </div>
    <script>
        $('.wallet-box').click(function() {
            id = $(this).attr('id')
            balance = $(this).attr('balance')
            name = $(this).children('.wallet-name').text()

            console.log(id)
            $.ajax({
                url: '{{ route('user.transaction.index') }}',
                type: 'GET',
                data: {
                    wallet_id: $(this).attr('id')
                },
                success: function(res) {
                    var transactions = JSON.parse(res)
                    var transactionHtml = ''
                    var sign = ''
                    console.log(transactions)

                    transactions.map(e => {
                        if (e.type == 'credit') {
                            sign = "-"
                        } else if (e.type == 'debit') {
                            sign = "+"
                        }
                        transactionHtml = transactionHtml +
                            `<div class="dark:bg-gray-300 rounded border dark:border-white flex flex-col p-2 m-2">
                                <div class="transaction-item_details">
                                    <h3> ${e.category}</h3>
                                    <span class="details">Payment #${e.id} - ${e.created_at.split(' ')[0]}</span>
                                </div>
                                <div class="flex">
                                    <p class="amount">${sign}${e.amount}</p>
                                    <span>$</span>
                                </div>
                                <div class="flex">
                                    <p class="describtion">
                                       ${e.describtion}</p>
                                </div>
                            </div>`
                    })
                    $('.right-trans').text('')
                    $('#wallet_id').val(id)
                    $('.right-trans').append(`
                        <div class="w-full flex-row flex h-1/6 items-center justify-between">
                            <h2 class="text-2xl"> ${name} </h2>

                            <h2 class="text-xl">Balance :  ${balance}$ </h2>
                            <button class="py-2 px-5 m-2 rounded dark:hover:bg-gray-700 dark:hover:text-white dark:bg-white dark:text-black  text-gray-700 bg-white border border-gray-200" onclick="$('.transaction-modal').show(400)"> Add Transaction </button>

                        </div>
                        <div class="flex flex-col h-5/6 overflow-scroll">
                            ${transactionHtml}
                        </div>
                    `)
                }

            })
        })
    </script>
</x-app-layout>
