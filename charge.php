<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./vendor/stripe/init.php');
define('STRIPE_SECRET_KEY','[sk_test_zUpltxJ97dKU7CEVARagjE8U]');
define('STRIPE_PUBLIC_KEY','[pk_test_cJhtOjA46tUKvSQIOPxsybmO]');
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"));
$results = array();
require './vendor/autoload.php';
\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);
$charge = "charge";
if(isset($charge)){
      $method = $charge;
    if($method =="charge"){
        $amount = $data->amount;
        $currency =  $data->currency;
        $source =  $data->source;
        $description =  $data->description;
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount, // Amount in cents
                "currency" => $currency,
                "source" => $source,
                "description" => $description
            ));
            if($charge!=null){
                $results['response'] = "Success";
                $results['message'] = "Charge has been completed";
            }
        } catch(\Stripe\Error\Card $e) {
            $results['response'] = "Error";
            $results['message'] = $e->getMessage();
        }
        echo json_encode($results);
    }else {
        $results['response'] = "Error";
        $results['messsage'] = "Method name is not correct";
        echo json_encode($results);
    }
}else {
    $results['response'] = "Error";
    $results['message'] = "No method has been set";
    echo json_encode($results);
}
