<?php
define('STRIPE_SECRET_KEY','[YOUR_SECRET_API_KEY]');
define('STRIPE_PUBLIC_KEY','[YOUR_PUBLISHEABLE_API_KEY]');
header('Content-Type: application/json');
$results = array();
require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);
try{
    $products  = \Stripe\Plan::all();
    $results['response'] = "Success";
    $results['plans'] = $products->data;

}catch (Exception $e){
    $results['response'] = "Error";
    $results['plans'] = $e->getMessage();
}
echo json_encode($results);
