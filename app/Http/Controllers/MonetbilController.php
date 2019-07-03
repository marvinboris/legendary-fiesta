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
            'item_ref' => $input['training_id'],
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
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = htmlspecialchars($value);
        }

        $user = User::where('email', $input['email'])->first();

        if (!$user) {
            error_log('Aucun utilisateur trouvé !');
            die('Aucun utilisateur trouvé !');
        }

        $transaction = Transaction::where("tx_id", $input['payment_ref'])->first();

        if (!$transaction) {
            $transaction = Transaction::create([
                'amount' => $request->amount ? $input['amount'] : 0,
                'tx_id' => $input['payment_ref'],
                'tx_hash' => $input['transaction_id'],
                'training_id' => +$request->input('item_ref'),
                'user_id' => $user->id,
                'vendor' => 'monetbil',
                'method' =>  $request->operator ? $input['operator'] : 'MTN',
                'type' => 'subscription',
                'status' => 'pending',
                'currency' => 'CFA',
                'address' => $input['phone']
            ]);
        }

        if ($request->currency) $transaction->currency = $input['currency'];
        if ($request->transaction_id) $transaction->tx_hash = $input['transaction_id'];
        $transaction->vendor = self::$settings['vendor'];

        if ($request->operator) $transaction->method = $input['operator'];
        if ($request->phone) $transaction->address = $input['phone'];
        if ($request->amount) $transaction->amount = $input['amount'];

        if ('success' === $input['status']) {
            $user->trainings()->attach($input['item_ref']);
            Session::flash('transaction_successful', 'La transaction a été effectuée avec succès.');
            $transaction->status = 'completed';
        } else if ('cancelled' === $input['status']) {
            Session::flash('transaction_cancelled', 'La transaction a été annulée.');
            $transaction->status = $input['status'];
        } else if ('failed' === $input['status']) {
            Session::flash('transaction_failed', 'La transaction a échoué.');
            $transaction->status = $input['status'];
        }

        $transaction->save();

        // Notify the user through an email
        Mail::to($input['email'])->send(new TransactionShipped($transaction));

        if ('success' === $input['status']) return redirect(route('trainings.mine.show', $input['item_ref']));
        return redirect(route('trainings.show', $input['item_ref']));
    }
}
