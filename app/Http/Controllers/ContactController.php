<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use GuzzleHttp\Client;

class ContactController extends Controller
{


    public function verifyByGoogle(Request $req)
    {
        $client = new Client();
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $response = $client->request('POST', $url, [
            "form_params" => [
                "secret" => "6LfqXGEdAAAAADMZqIkOWk_7bkc3AdJggEaOCkZO",
                "response" => $req->{"g-recaptcha-response"}
            ]
        ]);
        $data = json_decode($response->getBody()->getContents());
        if ($data->success) {
            return true;
        }
        return false;

        // 6LfqXGEdAAAAADMZqIkOWk_7bkc3AdJggEaOCkZO
        // token

    }
    public function create(ContactRequest $req)
    {
        if ($this->verifyByGoogle($req)) {
            Contact::create($req->all());
        }

        return redirect()->back();
    }
}
