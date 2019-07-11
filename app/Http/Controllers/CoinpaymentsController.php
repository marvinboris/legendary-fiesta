<?php

namespace App\Http\Controllers;

use App\Transaction;
use GuzzleHttp\Client;
use CoinpaymentsAPI;

class CoinpaymentsController extends Controller
{
    // private $settings;
    // private $client;
    // protected $cp;

    // public function __construct()
    // {
    //     $this->settings = [
    //         'apikey' => env('COINPAYMENTS_KEY'),
    //         'privatekey' => env('COINPAYMENTS_SECRET'),
    //         'base_url' => 'https://www.coinpayments.net/api.php'
    //     ];

    //     $this->cp = new \CoinPaymentsAPI();
    //     $this->cp->setup($this->settings['apikey'], $this->settings['privatekey']);
    //     $this->client = new Client([
    //         'base_uri' => $this->settings['base_url'],
    //         'timeout' => 180
    //     ]);
    // }

    // /**
    //  * Notification endpoint, after a deposit
    //  * @param \Illuminate\Http\Request $request 
    //  * @return void 
    //  */
    // public function notify(Request $request)
    // {
    //     // Check if the param invoice which contains the user_id exists
    //     $input = $request->all();
    //     foreach ($input as $key => $value) {
    //         $input[$key] = htmlspecialchars($value);
    //     }

    //     if (!empty(($request->has('invoice') ? $input['invoice'] : null))) {
    //         $user = User::find(($request->has('invoice') ? $input['invoice'] : null));

    //         if (!$user) {
    //             error_log("User not found");
    //             die();
    //         }

    //         $transaction = Transaction::create([
    //             'amount' => ($request->has('amount') ? $input['amount'] : null),
    //             'tx_id' => ($request->has('txn_id') ? $input['txn_id'] : null),
    //             'user_id' => $user->id,
    //             'vendor' => 'coinpayments',
    //             'method' => 'crypto',
    //             'type' => 'subscription',
    //             'status' => 'pending',
    //             'currency' => ($request->has('currency2') ? $input['currency2'] : null),
    //         ]);
    //     }

    //     // Handle deposit here .. 
    //     $transaction = Transaction::where('tx_id', ($request->has('txn_id') ? $input['txn_id'] : null))->first();

    //     if ('simple' != ($request->has('ipn_type') ? $input['ipn_type'] : null) || 'USD' != ($request->has('currency1') ? $input['currency1'] : null)) {
    //         die();
    //     }

    //     if ($transaction) {
    //         if ('completed' == $transaction->status) {
    //             die();
    //         } else {
    //             if (($request->has('status') ? $input['status'] : null) >= 100) {
    //                 //Check if the request status is greater than 100 then we give value to the user 
    //                 //Some conversions should be done before giving value to users 
    //                 $amount = round(($request->has('net') ? $input['net'] : null), 8, PHP_ROUND_HALF_DOWN);

    //                 $transaction->status = 'completed';
    //                 $transaction->amount = $amount;
    //                 $transaction->save(); 
    //             } elseif (($request->has('status') ? $input['status'] : null) < 0) {
    //                 $transaction->status = 'failed';
    //                 $transaction->save();
    //             } else {
    //                 $transaction->status = 'pending';
    //                 $transaction->save();
    //             }
    //             Mail::to($user->email)->send(new TransactionShipped($transaction));
    //         }
    //     } else {
    //         $amount = round(($request->has('net') ? $input['net'] : null), 8, PHP_ROUND_HALF_DOWN);
    //         $ref = time();

    //         $fees = round(($request->has('fee') ? $input['fee'] : null), 8, PHP_ROUND_HALF_DOWN);

    //         $transaction = Transaction::create([
    //             'amount' => $amount,
    //             'tx_id' => ($request->has('txn_id') ? $input['txn_id'] : null),
    //             'tx_hash' => $ref,
    //             'vendor' => 'coinpayments',
    //             'method' => 'crypto',
    //             'address' => ($request->has('address') ? $input['address'] : null),
    //             'ticker_symbol' => ($request->has('currency2') ? $input['currency2'] : null),
    //             'type' => 'deposit',
    //             'status' => 'pending',
    //         ]);

    //         if (($request->has('status') ? $input['status'] : null) >= 100) {
    //             //Check if the request status is greater than 100 then we give value to the user 
    //             //Some conversions should be done before giving value to users 
    //             $transaction->status = 'completed';
    //             $transaction->save();
    //         } elseif (($request->has('status') ? $input['status'] : null) < 0) {
    //             $transaction->status = 'failed';
    //             $transaction->save();
    //         } else {
    //             $transaction->status = 'pending';
    //             $transaction->save();
    //         }
    //         Mail::to($user->email)->send(new TransactionShipped($transaction));
    //     }
    // }

    private $public_key;
    private $private_key;
    private $api;

    public function __construct()
    {
        $this->public_key = env('COINPAYMENTS_KEY');
        $this->private_key = env('COINPAYMENTS_SECRET');
        $this->api = new CoinPaymentsAPI($this->private_key, $this->public_key, 'json');
    }

    public function getBasicInfo()
    {
        return dd($this->api->GetBasicInfo());
    }
}
