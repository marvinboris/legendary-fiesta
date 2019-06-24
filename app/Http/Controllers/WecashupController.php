<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WecashupController extends Controller
{
    //
    public function payment(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');

        return $request->all();

        $merchant_uid = 'oVLJd1IZlURWWyX2JJR0IfCSwqC2';
        $merchant_public_key = 'pk_live_df3FRABCpT27ccDK';
        $merchant_secret = 'sk_live_tegP86cVdXy2qpZ1RESxpcTXy74Ij6lZG5W0Jf3NzPo9';
        $transaction_uid = ''; // create an empty transaction_uid
        $transaction_token  = ''; // create an empty transaction_token
        $transaction_provider_name  = ''; // create an empty transaction_provider_name
        $transaction_confirmation_code  = ''; // create an empty confirmation code
        if ($request->has('transaction_uid')) $transaction_uid = htmlspecialchars($request->transaction_uid); // Get the transaction_uid posted by the payment box
        if ($request->has('transaction_token')) $transaction_token  = htmlspecialchars($request->transaction_token); // Get the transaction_token posted by the payment box
        if ($request->has('transaction_provider_name')) $transaction_provider_name  = htmlspecialchars($request->transaction_provider_name); // Get the transaction_provider_name posted by the payment box
        if ($request->has('transaction_confirmation_code')) $transaction_confirmation_code  = htmlspecialchars($request->transaction_confirmation_code); // Get the transaction_confirmation_code posted by the payment box
        $url = 'https://www.wecashup.com/api/v2.0/merchants/' . $merchant_uid . '/transactions/' . $transaction_uid . '?merchant_public_key=' . $merchant_public_key;

        //Steps 7 : You must complete this script at this to save the current transaction in your database.
        /* Provide a table with at least 5 columns in your database capturing the following
	/  transaction_uid | transaction_confirmation_code| transaction_token| transaction_provider_name | transaction_status */


        //Step 8 : Sending data to the WeCashUp Server

        $fields = array(
            'merchant_secret' => urlencode($merchant_secret),
            'transaction_token' => urlencode($transaction_token),
            'transaction_uid' => urlencode($transaction_uid),
            'transaction_confirmation_code' => urlencode($transaction_confirmation_code),
            'transaction_provider_name' => urlencode($transaction_provider_name),
            '_method' => urlencode('PATCH')
        );
        $fields_string = '';
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Step 9  : Retrieving the WeCashUp Response

        $server_output = curl_exec($ch);

        echo $server_output;

        curl_close($ch);

        $data = json_decode($server_output, true);

        if ($data['response_status'] == "success") {

            //Do wathever you want to tell the user that it's transaction succeed or redirect him/her to a success page

            $location = 'https://www.wecashup.cloud/cdn/tests/websites/PHP/responses_pages/success.html';
            // Auth::user()->trainings()->attach();
        } else {

            //Do wathever you want to tell the user that it's transaction failed or redirect him/her to a failure page

            $location = 'https://www.wecashup.cloud/cdn/tests/websites/PHP/responses_pages/failure.html';
        }

        //redirect to your feedback page
        echo '<script>top.window.location = "' . $location . '"</script>';
    }

    public function webhook(Request $request)
    {
        return $request->all();
        /****************************VERY IMPORTANT TO READ ***************************
                            WECASHUP DEFAULT WEBHOOK                      
                                                                          
                    This piece of code is written to enable               
                merchants to get informed about the status of            
        pending transactions that are being processed asynchronously by   
        WeCashUp. If a transaction was pending and WeCashUp receive a     
        payment confirmation from one of the CASH, TELCO or M-WALLET      
		provider, WeCashUp will inform the merchant by forwarding the 
        transaction status to this Default Webhook script on the merchant's 
		server. As WeCashUp is the only one system knowing the merchant's 
		secret key and that the communication between WeCashUp and the 
		merchant's server is secure (via SSL), WeCashUp will send the 
		merchant_secret with the transaction_uid, transaction_status, 
		transaction_details and transaction_token. 
		 
		To reduce the risk of getting spammed by other individuals willing
		to deceive the merchant's default webhook, merchant should considers 
		that the received data are valid if and only if : 
		
		1. the received merchant_secret match his configuration merchant_secret 
		2. the received transaction_uid match one of the transaction in his database 
		3. the received transaction_token match the exact same transaction's transaction_token 
		 
		If everything match,  merchant should update the current transaction 
		in his database and can take action (cancel transaction if received status 
		is "FAILED" or launch the delivery process if received status is "PAID".
		The possible status are : PAID or FAILED 		   
 																		   
         ***************************************************************************/

        $merchant_secret = 'sk_live_tegP86cVdXy2qpZ1RESxpcTXy74Ij6lZG5W0Jf3NzPo9';

        // Create and initialize variables to be sent to confirm the that the ongoing transaction is associated with the current merchant

        $received_transaction_merchant_secret = null; //create an empty received_transaction_merchant_secret
        $received_transaction_uid = null; //create an empty received_transaction_uid 
        $received_transaction_status  = null; //create an empty received_transaction_status
        $received_transaction_details = null; //create an empty received_transaction_details
        $received_transaction_token = null; //create an empty received_transaction_token
        $authenticated = 'false'; //create an authentication boolean and initialize it at false

        //extracting data from the post and filling the variable above
        if ($request->has('merchant_secret')) $received_transaction_merchant_secret = htmlspecialchars($request->merchant_secret); //Get the merchant_secret posted by WeCashUp.
        if ($request->has('transaction_uid')) $received_transaction_uid = htmlspecialchars($request->transaction_uid); //Get the transaction_uid posted by WeCashUp
        if ($request->has('transaction_status')) $received_transaction_status  = htmlspecialchars($request->transaction_status); //Get the transaction_status posted by WeCashUp
        if ($request->has('transaction_amount')) $received_transaction_amount  = htmlspecialchars($request->transaction_amount); //Get the transaction_amount posted by WeCashUp
        if ($request->has('transaction_receiver_currency')) $received_transaction_receiver_currency  = htmlspecialchars($request->transaction_receiver_currency); //Get the transaction_amount posted by WeCashUp
        if ($request->has('transaction_details')) $received_transaction_details  = htmlspecialchars($request->transaction_details); //Get the transaction_details posted by WeCashUp
        if ($request->has('transaction_token')) $received_transaction_token  = htmlspecialchars($request->transaction_token); //Get the transaction_token posted by WeCashUp
        if ($request->has('transaction_type')) $received_transaction_type  = htmlspecialchars($request->transaction_type); //Get the transaction_type posted by WeCashUp

        echo '<br><br> received_transaction_merchant_secret : ' . $received_transaction_merchant_secret;
        echo '<br><br> received_transaction_uid : ' . $received_transaction_uid;
        echo '<br><br> received_transaction_token : ' . $received_transaction_token;
        echo '<br><br> received_transaction_details : ' . $received_transaction_details;
        echo '<br><br> received_transaction_amount : ' . $received_transaction_amount;
        echo '<br><br> received_transaction_status : ' . $received_transaction_status;
        echo '<br><br> received_transaction_type : ' . $received_transaction_type;

        /***** SAVE THIS IN YOUD DATABASE - start ****************/

        $file = $received_transaction_uid . '.txt';
        $txt = "received_transaction_merchant_secret : " . $received_transaction_merchant_secret . "\n" .
            "received_transaction_uid : " . $received_transaction_uid . "\n" .
            "received_transaction_token : " . $received_transaction_token . "\n" .
            "received_transaction_details : " . $received_transaction_details . "\n" .
            "received_transaction_amount : " . $received_transaction_amount . "\n" .
            "received_transaction_receiver_currency : " . $received_transaction_receiver_currency . "\n" .
            "received_transaction_status : " . $received_transaction_status . "\n" .
            "received_transaction_type : " . $received_transaction_type . "\n";

        $myfile = fopen($file, "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);

        /***** SAVE THIS IN YOUD DATABASE - end ****************/



        //Authentication |We make sure that the received data come from a system that knows our secret key (WeCashUp only)
        if ($received_transaction_merchant_secret != null && $received_transaction_merchant_secret == $merchant_secret) {
            //received_transaction_merchant_secret is Valid

            echo '<br><br> merchant_secret [MATCH]';

            //Now check if you have a transaction with the received_transaction_uid and received_transaction_token

            $database_transaction_uid = 'TEST_UID'; //************* LOAD FROM YOUR DATABASE ****************
            $database_transaction_token = 'TEST_TOKEN'; //************* LOAD FROM YOUR DATABASE ****************

            if ($received_transaction_uid != null && $received_transaction_uid == $database_transaction_uid) {
                //received_transaction_merchant_secret is Valid

                echo '<br><br> transaction_uid [MATCH]';

                if ($received_transaction_token  != null && $received_transaction_token == $database_transaction_token) {
                    //received_transaction_token is Valid 

                    echo '<br><br> transaction_token [MATCH]';

                    //All the 3 parameters match, so...
                    $authenticated = 'true';
                }
            }
        }

        echo '<br><br>authenticated : ' . $authenticated;

        if ($authenticated == 'true') {

            //Update and process your transaction

            if ($received_transaction_status == "PAID") {
                //Save the transaction status in your database and do whatever you want to tell the user that it's transaction succeed
                echo '<br><br> transaction_status : ' . $transaction_status;
            } else { //Status = FAILED

                //Save the transaction status in your database and do whatever you want to tell the user that it's transaction failed
                echo '<br><br> transaction_status : ' . $transaction_status;
            }

            /***** SAVE THIS IN YOUD DATABASE - start ****************/

            $file = 'transactions.txt';
            $txt = "received_transaction_merchant_secret : " . $received_transaction_merchant_secret . "\n" .
                "received_transaction_uid : " . $received_transaction_uid . "\n" .
                "received_transaction_token : " . $received_transaction_token . "\n" .
                "received_transaction_details : " . $received_transaction_details . "\n" .
                "received_transaction_status : " . $received_transaction_status . "\n" .
                "received_transaction_type : " . $received_transaction_type . "\n";

            $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
            fwrite($myfile, $txt);
            fclose($myfile);
            /***** SAVE THIS IN YOUD DATABASE - end ****************/

            /*
			NOTE : 	You can analyze each variable in order to process further operations like sending 
					an email to the customer to inform him that his transaction failed or launching the 
					delivery process if the transaction succeed.
		*/
        }
	
        /* If the one of the 3 parameters above doesn't match, this default webhook script will ignore the request. 
        You can also save them in your logs if you want to keep track of everything that happens here.
        
        If you are here it means that you are done with the WeCashUp's integration, we wish you to make lot of money and become billionaire.
        If so ma broda ma sista, please don't forget to buy me a beer *_*.
        */
    }
}



