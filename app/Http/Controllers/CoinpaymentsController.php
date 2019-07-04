<?php

namespace App\Http\Controllers;

use App\Transaction;
use GuzzleHttp\Client;

class CoinpaymentsController extends Controller
{
    private $settings;
    private $client;
    protected $cp;

    public function __construct()
    {
        $this->settings = [
            'apikey' => env('COINPAYMENTS_KEY'),
            'privatekey' => env('COINPAYMENTS_SECRET'),
            'base_url' => 'https://www.coinpayments.net/api.php'
        ];

        $this->cp = new \CoinPaymentsAPI();
        $this->cp->setup($this->settings['apikey'], $this->settings['privatekey']);
        $this->client = new Client([
            'base_uri' => $this->settings['base_url'],
            'timeout' => 180
        ]);
    }

    /**
     * Notification endpoint, after a deposit
     * @param \Illuminate\Http\Request $request 
     * @return void 
     */
    public function notify(Request $request)
    {
        // Check if the param invoice which contains the user_id exists

        if (!empty($request->invoice)) {
            $user = User::find($request->invoice);
            if (!$user) {
                error_log("User not found");
                die();
            }

            $deposit = new Transaction([
                'amount' => $request->amount,
                'tx_id' => $request->txn_id,
                'user_id' => $user->id,
                'vendor' => 'coinpayments',
                'method' => 'crypto',
                'type' => 'subscription',
                'status' => 'pending',
                'currency' => $request->currency2,
            ]);

            $deposit->save();
        }
        // Handle deposit here .. 
        $deposit = Transaction::where('tx_id', $request->txn_id)->first();

        if ('simple' != $request->ipn_type || 'USD' != $request->currency1) {
            die();
        }

        if ($deposit) {
            if ('completed' == $deposit->status) {
                die();
            } else {
                if ($request->status >= 100) {
                    //Check if the request status is greater than 100 then we give value to the user 
                    //Some conversions should be done before giving value to users 
                    $amount = round($request->net, 8, PHP_ROUND_HALF_DOWN);

                    $deposit->status = 'completed';
                    $deposit->amount = $amount;
                    $deposit->save();

                    // Sending mail to the user 
                    // $user = User::where('id', $deposit->user_id)->first();
                    // $user->notify(new TransactionsNotify($deposit));
                } elseif ($request->status < 0) {
                    $deposit->status = 'failed';
                    $deposit->save();
                } else {
                    $deposit->status = 'pending';
                    $deposit->save();
                }
            }
        } else {
            $amount = round($request->net, 8, PHP_ROUND_HALF_DOWN);
            $ref = $this->generateRef();

            $fees = round($request->fee, 8, PHP_ROUND_HALF_DOWN);

            $deposit = new Transaction([
                'amount' => $amount,
                'tx_id' => $request->txn_id,
                'tx_hash' => $ref,
                'vendor' => 'coinpayment',
                'method' => 'crypto',
                'address' => $request->address,
                'ticker_symbol' => $request->currency2,
                'type' => 'deposit',
                'status' => 'pending',
            ]);

            if ($request->status >= 100) {
                //Check if the request status is greater than 100 then we give value to the user 
                //Some conversions should be done before giving value to users 
                $deposit->status = 'completed';
                $deposit->save();

                // Notify the user through mail about the transaction
                // $user = User::where('id', $deposit->user_id)->first();
                // $user->notify(new TransactionsNotify($deposit));
            } elseif ($request->status < 0) {
                $deposit->status = 'failed';
                $deposit->save();
            } else {
                $deposit->status = 'pending';
                $deposit->save();
            }
        }
    }
}
