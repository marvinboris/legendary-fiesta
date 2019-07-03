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
            'payment_ref' => time(),
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
        return $request->all();
        $user = User::where('email', htmlspecialchars($request->email))->first();

        if (!$user) {
            error_log('Aucun utilisateur trouvé !');
            die('Aucun utilisateur trouvé !');
        }

        $transaction = Transaction::where("tx_id", htmlspecialchars($request->payment_ref))->first();

        if (!$transaction) {
            $transaction = Transaction::create([
                'amount' => htmlspecialchars($request->amount ? $request->amount : 0),
                'tx_id' => htmlspecialchars($request->payment_ref),
                'tx_hash' => htmlspecialchars($request->transaction_id),
                'item_ref' => +htmlspecialchars($request->item_ref),
                'user_id' => $user->id,
                'vendor' => 'monetbil',
                'method' =>  htmlspecialchars($request->operator) ? htmlspecialchars($request->operator) : 'MTN',
                'type' => 'subscription',
                'status' => 'pending',
                'currency' => 'CFA',
                'address' => htmlspecialchars($request->phone)
            ]);
        }

        $transaction->currency = htmlspecialchars($request->currency);
        $transaction->tx_hash = htmlspecialchars($request->transaction_id);
        $transaction->vendor = self::$settings['vendor'];

        $transaction->method = htmlspecialchars($request->operator);
        $transaction->address = htmlspecialchars($request->phone);
        $transaction->amount = htmlspecialchars($request->amount);

        if ('success' === htmlspecialchars($request->status)) {
            $user->trainings()->attach(htmlspecialchars($request->item_ref));
            Session::flash('transaction_successful', 'La transaction a été effectuée avec succès.');
            $transaction->status = 'completed';
        } else if ('cancelled' === htmlspecialchars($request->status)) {
            Session::flash('transaction_cancelled', 'La transaction a été annulée.');
            $transaction->status = htmlspecialchars($request->status);
        } else if ('failed' === htmlspecialchars($request->status)) {
            Session::flash('transaction_failed', 'La transaction a échoué.');
            $transaction->status = htmlspecialchars($request->status);
        }

        $transaction->save();

        // Notify the user through an email
        Mail::to(htmlspecialchars($request->email))->send(new TransactionShipped($transaction));

        if ('success' === htmlspecialchars($request->status)) return redirect(route('trainings.mine.show', htmlspecialchars($request->item_ref)));
        return redirect(route('trainings.show', htmlspecialchars($request->item_ref)));
    }
}
