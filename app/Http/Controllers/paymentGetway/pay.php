<?php

namespace App\Http\Controllers\paymentGetway;


class Pay extends Payment {

    public function execute($address_id, $amounts){
        // dd($amounts);
        $api = 'test';
        $amount = "20000";
        $redirect = route('home.payment.verify');
        $result = $this->send($api, $amount, $redirect);
        $result = json_decode($result);

        // ساخت جداول مربوط به سفارش
        $create_order= parent::createOrder($address_id , $amounts , $result->token);
        if(array_key_exists('error', $create_order)){
            return $create_order;
        }
        // dd($result);
        if($result->status) {
            $go = "https://pay.ir/pg/$result->token";
            return ['success' => $go];
        } else {
            return ['error' => $result->errorMessage];
        }
    }

    public function send($api, $amount, $redirect, $mobile = null, $factorNumber = null, $description = null) {
        return $this->curl_post('https://pay.ir/pg/send', [
            'api'          => $api,
            'amount'       => $amount,
            'redirect'     => $redirect,
            'mobile'       => $mobile,
            'factorNumber' => $factorNumber,
            'description'  => $description,
        ]);
    }

    public function verify($api, $token) {
        return $this->curl_post('https://pay.ir/pg/verify', [
            'api' 	=> $api,
            'token' => $token,
        ]);
    }

    public function curl_post($url, $params){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

}
