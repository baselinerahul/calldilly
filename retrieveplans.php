<?php
define('STRIPE_SECRET_KEY','[sk_test_zUpltxJ97dKU7CEVARagjE8U]');
define('STRIPE_PUBLIC_KEY','[pk_test_cJhtOjA46tUKvSQIOPxsybmO]');
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
