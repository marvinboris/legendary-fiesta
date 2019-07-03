<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\TransactionShipped;

class MonetbilController extends Controller
{
    private static $settings = [
        'vendor' => 'monetbil',
        'base_url' => 'https://api.monetbil.com/v2.1',
        'apikey' => 'TCmEXnKijkPfK47EgRDzOmIbUMST7mqv',
    ];

    /**
     * Generate data necessary for the widget
     * @param Array
     * @return Array
     */
    public static function generateWidgetData($input)
    {
        $payload = [
            'status' => 'success',
            'link' => null
        ];

        $user = Auth::user();

        $json = [
            'amount' => $input['amount'],
            'item_ref' => $input['item_ref'],
            'country' => 'XAF',
            'logo' => 'https://autoecoleuniversite.com/images/LOGO%20AUTO%20ECOLE%20UNIVERSITE.png',
            'email' => $user->email,
            'country' => 'CM'
        ];

        $client = new Client([
            'base_uri' => self::$settings['base_url'],
            'timeout' => 180
        ]);

        $response = $client->post('https://api.monetbil.com/widget/v2.1/' . self::$settings['apikey'], [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => $json
        ]);

        $response = json_decode($response->getBody()->getContents());

        if (1 === +$response->success) {
            // User will be redirected to complete their payment
            $payload['link'] = $response->payment_url;
        } else {
            $payload['status'] = 'failure';
            $payload['link'] = 'Erreur lors de la procédure, veuillez réessayer.';
        }

        return $payload;
    }

    /**
     * Get notified about the transaction 
     * @param Request
     * @return \Illuminate\Http\Response
     */
    public function notify(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            error_log('Aucun utilisateur trouvé !');
            die('Aucun utilisateur trouvé !');
        }

        $transaction = Transaction::where("tx_id", $request->payment_ref)->first();

        if (!$transaction) {
            $transaction = Transaction::create([
                'amount' => $request->amount,
                'tx_id' => $request->payment_ref,
                'tx_hash' => 'null',
                'item_ref' => $request->item_ref,
                'user_id' => $user->id,
                'vendor' => 'monetbil',
                'method' =>  $request->operator,
                'type' => 'subscription',
                'status' => 'pending',
                'currency' => 'CFA',
                'address' => $request->phone
            ]);
        }

        $transaction->currency = $request->currency;
        $transaction->tx_hash = $request->transaction_id;
        $transaction->vendor = self::$settings['vendor'];

        $transaction->method = $request->operator;
        $transaction->address = $request->phone;
        $transaction->amount = $request->amount;

        if ('success' === $request->status) {
            $user->trainings()->attach($request->item_ref);
            Session::flash('transaction_successful', 'La transaction a été effectuée avec succès.');
            $transaction->status = 'completed';
        } else if ('cancelled' === $request->status) {
            Session::flash('transaction_cancelled', 'La transaction a été annulée.');
            $transaction->status = $request->status;
        } else if ('failed' === $request->status) {
            Session::flash('transaction_failed', 'La transaction a échoué.');
            $transaction->status = $request->status;
        }

        $transaction->save();

        // Notify the user through an email
        Mail::to($request->email)->send(new TransactionShipped($transaction));

        if ('success' === $request->status) return redirect(route('trainings.mine.show', $request->item_ref));
        return redirect(route('trainings.show', $request->item_ref));
    }
}
