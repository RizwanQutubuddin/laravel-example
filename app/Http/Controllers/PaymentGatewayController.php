<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Models\PaymentGateway;

class PaymentGatewayController extends Controller
{
    public function createPayment(){
        return view('payment-page');
    }
    public function payment(Request $request){

        $data["amount"]=floatval($request->input('amount'));
        $data["currency"]="USD";
        $data["currency"]="USD";
        $data["customer"]["first-name"]=$request->input('name');
        $data["customer"]["email"]=$request->input('email');
        $data["customer"]["phone"]["country_code"]="+91";
        $data["customer"]["phone"]["country_number"]="9555447807";
        $data["source"]["id"]="src_card";
        $data["redirect"]["url"]="https://www.google.com/";

        $response = Curl::to('http://foo.com/bar')
        ->withBearer('123')
        ->withData($data)
        ->asJson()
        ->post();

        return redirect()->to($response->transaction->url);
    }
    public function callback(){
        // $data['name'] =
        // $data['email'] =
        // $data['tran_id'] =
        // $data['amount'] =
        // PaymentGateway::create($data);
        return redirect()->route('payment.create');
    }
    public function get(){
        //
    }
}
