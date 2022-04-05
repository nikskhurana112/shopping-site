<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\Product;
use Twilio\Rest\Client;
use Instamojo\Instamojo;
use Illuminate\Http\Request;
use App\Payment\InstamojoProcessing;
use Illuminate\Support\Facades\Auth;

class   ProductController extends Controller
{
    public function add()
    {

        return view("product.add");
    }
    public function create(Request $req)
    {

        $data['Title'] = $req->product_name;
        $data['Description'] = $req->description;
        $data['Price'] = $req->price;
        $data['ImagePath'] = $req->image_path->store("product", ['disk' => 'public']);


        Product::create($data);
        session()->flash("success", "Product Added Successfully");
        return redirect()->back();
    }
    public function displayProduct()
    {
        $products = Product::latest()->paginate(10);
        return view("product.displayProducts", ["products" => $products]);
    }
    public function buy(Request $req)
    {
        $product = Product::find($req->id);
        return view("product.buy")->with(["product" => $product]);
    }
    public function editProduct(Request $req)
    {
        $product = Product::find($req->id);
        return view("product.edit")->with(["product" => $product]);
    }
    public function deleteProduct(Request $req)
    {
        Product::where('id', '=', $req->id)->delete();
        return redirect()->back();
    }
    public function updateProduct(Request $req)
    {
        $product = Product::find($req->id);
        $product->Title = $req->title;
        $product->Description = $req->description;
        $product->Price = $req->price;
        $product->ImgPath = $req->img_path;

        $product->save();

        return redirect()->route("admin.product.product_list");
    }
    public function productsList()
    {
        $product = Product::latest()->paginate(10);
        return view('product.products_list')->with(["products" => $product]);
    }
    public function checkout(Request $req, InstamojoProcessing $instamojoProcessing)
    {
        $product = Product::find($req->id);
        $user = Auth::user();
        $data["user_id"] = $user->name;
        $data["product_id"] = $product->id;
        $response = $instamojoProcessing->charge($product->Price, $product->Title, $user->email);
        dd($response);
        $data['payment_id'] = $response['id'];
        Order::create($data);
        return redirect()->to($response['longurl']);
        // return view('product.checkout')->with(['product' =>$product]);
    }

    public function verify(Request $req, InstamojoProcessing $instamojoProcessing)
    {
        if ($req->payment_status == "Credit") {
            $order = Order::wherePaymentId($req->payment_request_id)->wherePaid(0)->first();
            if ($order != null) {
                $status = $instamojoProcessing->verifyPayment($req->payment_request_id);
                if ($status == true) {
                    $order->paid = 1;
                    $order->save();
                    return "Thank You";
                }
                return "oops!";
            }
        }
        return "oops!";
    }

    public function sendOTP(Request $request)
    {

        $receiverNumber = $request->phone;

        $receiverNumber = "+" . $receiverNumber;

        try {

            // $receiverNumber = "";
            if (empty($receiverNumber)) {
                return array('error' => 'Please enter phone number');
            }

            //$randon = rand(100000, 999999);
            //$message = "your Zebra register OTP is - $randon";

            /* for now static otp  */
            // $randon = 111111;

            // Session::put('session_otp', $randon);
            // return array('success' => 'SMS Sent Successfully.', 'code' => $randon);

            $random = rand(100000, 999999);
            // Session::put('session_otp', $random);
            $message = " Your otp is  " . $random;

            $twilio_number = "+19108078617";
            $auth_token = "74f7801c5132aeca3a37df59bde72787";
            $account_sid = "AC0bba1d64893aa5bfcde20010a6a65017";


            //  $account_sid = "AC488e8664d0dd023c1b2d42b516066300";
            //   $auth_token = "8fb21521c57788b6e8228f36e17cc75c";
            //   $twilio_number = "+18055907714";
            //	$receiverNumber = "+919569414011";
            $client = new Client($account_sid, $auth_token);

            $send = $client->messages->create($receiverNumber, ['from' => $twilio_number, 'body' => $message]);



            //print_r($send); die;		

            return array('success' => 'SMS Sent Successfully.', 'code' => $random);
        } catch (Exception $e) {
            //print_r($e->getMessage()); die;
            return array('error' => $e->getMessage());
        }
    }

    public function checkedBox()
    {
        return view('product.checkedBox');
    }
}
