<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LoyaltyPointCalculator;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('quantity', '>=', $item->prod_quantity)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();

        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->products->selling_price * $prod->prod_quantity;
        }
        $order->total_price = $total;

        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->postalcode = $request->input('postalcode');
        $order->tracking_no = 'fos' . rand(1111, 9999);

        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');
        $order->save();

        // Calculate loyalty points using LoyaltyPointCalculator
        $loyaltyPointCalculator = new LoyaltyPointCalculator();
        $loyaltyPoints = $loyaltyPointCalculator->calculate($order);

        // Check if the user's total points are greater than or equal to 100 after adding new points
        if (($loyaltyPoints + Auth::user()->points) >= 100) {
            // Calculate the number of vouchers the user can redeem
            $numVouchersToRedeem = floor(($loyaltyPoints + Auth::user()->points) / 100);

            // Calculate the remaining points after issuing vouchers
            $remainingPoints = max(0, ($loyaltyPoints + Auth::user()->points) - ($numVouchersToRedeem * 100));

            // Issue a $10 voucher for every 100 points
            $voucherAmount = 10;
            $voucherCode = 'RM' . $voucherAmount . ' OFF';

            // Create vouchers and deduct points for each voucher
            for ($i = 0; $i < $numVouchersToRedeem; $i++) {
                Voucher::create([
                    'user_id' => Auth::id(),
                    'amount' => $voucherAmount,
                    'vcode' => $voucherCode,
                ]);
            }

            // Deduct points after issuing the vouchers
            $user = Auth::user();
            $user->points = $remainingPoints;
            $user->save();
        } else {
            // Update user's loyalty points without issuing vouchers
            $user = Auth::user();
            $user->points += $loyaltyPoints;
            $user->save();
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'quantity' => $item->prod_quantity,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_quantity;
            $prod->update();
        }

        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->postalcode = $request->input('postalcode');
            $user->update();
        }

        // Check if the user has any available vouchers that are not fully redeemed
        $availableVouchers = Voucher::where('user_id', Auth::id())->where('is_used', false)->get();
        $totalPriceAfterDiscount = $order->total_price;

        // Ensure that the user can only use one voucher at a time
        $isVoucherApplied = false;

        foreach ($availableVouchers as $voucher) {
            // Check if the voucher amount is less than or equal to the remaining total price
            if ($voucher->amount <= $totalPriceAfterDiscount && !$isVoucherApplied) {
                // Deduct the voucher amount from the total price
                $totalPriceAfterDiscount -= $voucher->amount;

                // Associate the voucher with the order and mark it as used
                $voucher->order_id = $order->id;
                $voucher->is_used = true;
                $voucher->save();

                // Mark that a voucher has been applied to the order
                $isVoucherApplied = true;
            }
        }

        // Save the updated total price after applying vouchers
        $order->total_price = max(0, $totalPriceAfterDiscount); // Ensure total price is not negative
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        if ($request->input('payment_mode') == "Paid by Paypal") {
            // Redirect to the 'my-orders' page after successful PayPal payment
            return response()->json(['status'=> 'Order placed Successfully']);
        }
        return redirect('/')->with('status', "Order placed Successfully");
    }

    // public function securepay(Request $request)
    // {
    //     $cartitems = Cart::where('user_id', Auth::id())->get();
    //     $total_price = 0;
    //     foreach($cartitems as $item)
    //     {
    //         $total_price +=$item->products->selling_price * $item->prod_quantity;
    //     }
        
    //     if(isset($_POST['id']))
    //     {
    //     //Change with your token	
    //     $uid = '96a587bb-24f8-4d4e-842e-71d22016d2eb';
    //     $checksum_token = 'bfca61721c02657ec91937bf9ebd2472f8840226810b074234db1c1f82bd5be9';
    //     $auth_token = 'JjiVXQ2vXmWZxgUpxz9z';
    //     $url = 'https://sandbox.securepay.my/api/v1/payments';

    //     #$_POST['order_number'] = '20200425132755';
    //     #$_POST['buyer_name'] = 'AHMAD AMSYAR MOHD ALI';
    //     #$_POST['buyer_email'] = 'amsyar@gmail.com';
    //     #$_POST['buyer_phone'] = '+60123121678';
    //     #$_POST['transaction_amount'] = '10.00';
    //     #$_POST['product_description'] = 'Payment for order no 20200425132755';
    //     #$_POST['callback_url'] = "";
    //     #$_POST['redirect_url'] = "";
    //     #$_POST['token'] = $auth_token;
    //     #$_POST['redirect_post'] = "true";

    //     $order_number = $_POST['payment_id'];
    //     $buyer_name = $_POST['fname'];
    //     $buyer_phone = $_POST['phone'];
    //     $buyer_email = $_POST['email'];
    //     $product_description = $_POST['lname'];
    //     $transaction_amount = $_POST['total_price'];
    //     $callback_url = $_POST['callback_url'];
    //     $redirect_url = $_POST['redirect_url'];
    //     $redirect_post = "true";
    //     if(isset($_POST['buyer_bank_code'])) { 
    //         $buyer_bank_code = $_POST['buyer_bank_code']; 
    //     }




    //     //buyer_email|buyer_name|buyer_phone|callback_url|order_number|product_description|redirect_url|transaction_amount|uid 

    //     $string = $buyer_email."|".$buyer_name."|".$buyer_phone."|".$callback_url."|".$order_number."|".$product_description."|".$redirect_url ."|".$transaction_amount."|".$uid;

    //     #echo $string . "\n";
    //     #string = "amsyar@gmail.com|AHMAD AMSYAR MOHD ALI|+60123121678||20200425132755|Payment for order no 20200425132755||1540.40|5d80cc30-1a42-4f9f-9d6b-a69db5d26b01​"


    //     #$string = "amsyar@gmail.com|AHMAD AMSYAR MOHD ALI|0123121678||20200425132755|Payment for order no 20200425132755||1540.40|2aaa1633-e63f-4371-9b85-91d936aa56a1​";
    //     #$checksum_token = "159026b3b7348e2390e5a2e7a1c8466073db239c1e6800b8c27e36946b1f8713​";

    //     $sign = hash_hmac('sha256', $string, $checksum_token);

    //     #echo $sign . "\n";

    //     //
    //     //echo $sign

    //     //$hashed_string = hash_hmac($checksum_token.urldecode($_POST['product_description']).urldecode($_POST['transaction_amount']).urldecode($_POST['order_number']));

    //     if(isset($_POST['buyer_bank_code'])) {  

    //     $post_data = "buyer_name=".urlencode($buyer_name)."&token=". urlencode($auth_token) 
    //     ."&callback_url=".urlencode($callback_url)."&redirect_url=". urlencode($redirect_url) . 
    //     "&order_number=".urlencode($order_number)."&buyer_email=".urlencode($buyer_email).
    //     "&buyer_phone=".urlencode($buyer_phone)."&transaction_amount=".urlencode($transaction_amount).
    //     "&product_description=".urlencode($product_description)."&redirect_post=".urlencode($redirect_post).
    //     "&checksum=".urlencode($sign)."&buyer_bank_code=".urlencode($buyer_bank_code);
    //     }
    //     else
    //     {
    //     $post_data = "buyer_name=".urlencode($buyer_name)."&token=". urlencode($auth_token) 
    //     ."&callback_url=".urlencode($callback_url)."&redirect_url=". urlencode($redirect_url) . 
    //     "&order_number=".urlencode($order_number)."&buyer_email=".urlencode($buyer_email).
    //     "&buyer_phone=".urlencode($buyer_phone)."&transaction_amount=".urlencode($transaction_amount).
    //     "&product_description=".urlencode($product_description)."&redirect_post=".urlencode($redirect_post).
    //     "&checksum=".urlencode($sign);	
    //     }


    //     #echo $post_data. "\n";

    //     // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_URL, $url);

    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);

    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //     curl_exec($ch);

    //     $output = curl_exec($ch);

    //     echo $output;

    //     }
    // }

}
