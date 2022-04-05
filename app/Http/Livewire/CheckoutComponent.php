<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Cart;
use Stripe;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipping;
use App\Models\Transaction;
use Exception;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{

    public $shipToDifferent;


    public $fname;
    public $lname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;

    public $province;
    public $zipcode;
    public $country;

    public $s_fname;
    public $s_lname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_price;
    public $s_qty;
    public $s_province;
    public $s_zipcode;
    public $s_country;

    public $card_no;
    public $cvc;
    public $exp_year;
    public $exp_month;

    public $thankyou;
    public $paymentmode;
    public $shipmethod;

    public $state=[];





    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'line2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
        ]);
    }
    public function placeorder()
    {
        $this->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'line2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'paymentmode' => 'required',
        ]);
        // if($this->paymentmode == 'card')
        // {
        //         $this->validate([
        //         'card_no'=>'required|numeric',
        //         'exp_month'=>'required|numeric',
        //         'exp_year'=>'required|numeric',
        //         'cvc' =>'required|numeric',
        //         ]);
        // }

        $order = new Order();
        // $order->user_id = ->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];


        $order->fname = $this->fname;
        $order->lname = $this->lname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;

        $order->province = $this->province;
        $order->zipcode = $this->zipcode;
        $order->country = $this->country;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->shipToDifferent ? 1 : 0;

        $order->save();
        foreach (Cart::instance('cart')->content() as $item) {
            $orderItems = new OrderItem();
            $orderItems->product_id = $item->id;
            $orderItems->order_id = $item->order_id;
            $orderItems->price = $item->price;
            $orderItems->qty = $item->qty;
            $orderItems->save();
        }
        if ($this->shipToDifferent)
         {
            $this->validate([
                's_fname' => 'required',
                's_lname' => 'required',
                's_email' => 'required|email',
                's_mobile' => 'required|numeric',
                's_line1' => 'required',
                's_line2' => 'required',
                's_city' => 'required',
                's_province' => 'required',
                's_zipcode' => 'required',
                's_country' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id=$order->id;
            $shipping->fname = $this->s_fname;
            $shipping->lname = $this->s_lname;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            // $shipping->qty = $this->s_qty;
            $shipping->price = $this->s_price;
            $shipping->province = $this->s_province;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->country = $this->s_country;

            // dd($shipping);
            $shipping->save();
        }


        if ($this->paymentmode == 'paypal')
        {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        }
        if($this->paymentmode == 'bank')
        {
            $transaction = new Transaction();
            //   $transaction->user_id=$id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'bank';
            $transaction->status ='pending';
            $transaction->save();

        }

        // else if ($this->paymentmode == 'card') {

        //     $this->makeTransaction($order->id, 'pending');
        //     $this->resetCart();
        // }
        //  else if ($this->paymentmode == 'card') {
        //     $stripe = Stripe::make(env('pk_token'));
        //     try {

        //         $token = $stripe->tokens()->create([
        //             'card' =>
        //             [
        //                 'number' => $this->card_no,
        //                 'exp_month' => $this->exp_month,
        //                 'exp_year' => $this->exp_year,
        //                 'cvc' => $this->cvc,
        //             ]

        //         ]);
        //         if (!isset($token['id']))
        //          {
        //             session()->flash('stripe_error', 'the strip token not generate');
        //             $this->thankyou = 0;
        //         }
        //         $customer = $stripe->customers()->create([
        //             'name' => $this->fname . ' ' . $this->lname,
        //             'email' => $this->email,
        //             'phone' => $this->mobile,
        //             'address' => [
        //                 'line1' => $this->line1,
        //                 'line2' => $this->line2,
        //             ],
        //             'source' => $token['id']
        //         ]);
        //         $charge = $stripe->charges()->create([
        //             'customer' => $customer['id'],
        //             'currency' => 'USD',
        //             'amount'   => session()->get('checkout')['total'],
        //             'description' => 'Payment for otder no' . $order->id
        //         ]);
        //         if ($charge['status'] == 'succeed') {
        //             $this->makeTransaction($order->id, 'approved');
        //             $this->resetCart();
        //         } else {
        //             session()->flash('stripe_error', 'Error');
        //             $this->thankyou = 0;
        //         }
        //     }
        //      catch (Exception $e) {
        //         session()->flash('strip_error', $e->getMessage());
        //         $this->thankyou = 0;
        //     }
        // }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

        $this->sendConfirmationOrder($order);
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        //   $transaction->user_id=$id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }
    public function resetCart()
    {

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {

        if ($this->thankyou) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }

    public function sendConfirmationOrder($order)
    {
         Mail::to($order->email)->send(New OrderMail($order));
    }
}
