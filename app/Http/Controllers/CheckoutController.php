<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Exception; //dipakai di midtrans

use Midtrans\Snap; //library midtrans
use Midtrans\Config; //Konfigurasi Midtrans

class CheckoutController extends Controller
{
    public function process(Request $request){
        // Save users data
        $user = Auth::user();
        $user->update($request->except('total_price')); //ambil semua data kecuali total_price

        //Process Checkout
        $code = 'STORE-'.mt_rand(0000, 9999);
        $carts = Cart::with(['product', 'user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
        
        //transaction create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-'.mt_rand(0000, 9999);  

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => "PENDING",
                'resi' => '',
                'code' => $trx 
            ]);
        }

        //Delete Cart Data
        Cart::where('users_id', Auth::user()->id)
            ->delete();

        //konfigurasi midtrans
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //array untuk dikirim ke midtrans
        $midtrans = array(
            'transaction_details' => array(
                'order_id' => $code,
                'gross_amount' => (int)  $request->total_price, //harus diubah ke integer agak tidak error di midtransnya
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => '08111222333',
            ),
            'enabled_payments' => array(
                'gopay', 'permata_va', 'bank_transfer'
            ),
            'vtweb' => array()
        );

        //konfigurasi transaksi
        try {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request){

    }
}
