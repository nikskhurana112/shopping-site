<?php

namespace App\Payment;

use Exception;
use Instamojo\Instamojo;

class InstamojoProcessing
{

    private $api;
    public function __construct()
    {
        $this->api = new Instamojo(env('INSTAMOJO_CLIENT_ID'), env('INSTAMOJO_CLIENT_SECRET'), 'https://test.instamojo.com/api/1.1/');
    }

    public function charge(int $amount, String $purpose, String $email)
    {
        try {
            $response = $this->api->paymentRequestCreate(array(
                "purpose" =>  $purpose,
                "amount" => $amount,
                "send_email" => true,
                "email" => $email,
                "redirect_url" => route('payment.verify')
            ));
            return $response;
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
        return  null;
    }

    public function verifyPayment(String $payment_id)
    {
        try {
            $response = $this->api->paymentRequestStatus($payment_id);
            return $response['status'] == "Completed" ? true : false;
        } catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    }
}
