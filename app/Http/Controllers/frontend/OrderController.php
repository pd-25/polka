<?php

namespace App\Http\Controllers\frontend;

use App\Core\order\OrderInterface;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductVariant;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;

class OrderController extends Controller
{
    public $orderInterface;
    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderInterface = $orderInterface;
    }
    public function cart()
    {
        return view('frontend.cart', [
            "carts" => $this->orderInterface->getAllCarts(auth()->id())
        ]);
    }

    public function addToCart(Request $request)
    {
        $validatedData = $request->validate([
            'productId' => 'required|integer',
            'variantId' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric'
        ]);

        $productVariant = ProductVariant::find($validatedData['variantId']);
        if (!$productVariant) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Product variant not found.'
            ], 404);
        }

        // Prepare the cart item
        $cartItem = [
            'product_id' => $validatedData['productId'],
            'product_variant_id' => $validatedData['variantId'],
            'quantity' => $validatedData['quantity'],
            'user_id' => auth()->id()
        ];

        Cart::create($cartItem);

        // Return success response
        return response()->json([
            'status' => 'success',
            'msg' => 'Item added to cart successfully!'
        ]);
    }

    public function updateCart(Request $request)
    {
        $cartId = $request->input('cart_id');
        $quantity = $request->input('quantity');

        // Find the cart item by ID
        $cartItem = Cart::find($cartId);
        if ($cartItem) {
            // Update the quantity
            $cartItem->quantity = $quantity;
            $cartItem->save();

            // Calculate the updated item total and cart total
            $itemTotal = $cartItem->productVariant->price * $quantity;


            return response()->json([
                'itemTotal' => $itemTotal,
                // 'cartTotal' => $cartTotal,
                'status' => true
            ]);
        }

        return response()->json(['error' => 'Cart item not found'], 404);
    }


    public function checkout()
    {
        return view('frontend.checkout', [
            "cartItems" => $this->orderInterface->getAllCarts(auth()->id())
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "street_address" => "required|string",
            "appertment_house_no" => "required|string",
            "town_city" => "required|string",
            "state" => "required|string",
            "postcode" => "required|string",
            "payment_mode" => "required|in:cash,razorpay",
        ]);
        $OrderData = $request->only("name", "email", "phone", "street_address", "appertment_house_no", "town_city", "postcode", "payment_mode");

        $placeOrderResponse  = $this->orderInterface->storeOrder($OrderData);

        if ($placeOrderResponse['status'] === true) {
            return redirect()->route("account")->with("msg", "Order placed successfully");
        } else {
            return back()->with("msg", $placeOrderResponse['msg'] ?? "Failed to place the order.");
        }
    }


    public function payPlaceOrder(Request $request)
    {
        
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');
        $signature = $request->input('razorpay_signature');

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            // Verify the payment signature
            $attributes = [
                'razorpay_order_id' => $orderId,
                'razorpay_payment_id' => $paymentId,
                'razorpay_signature' => $signature
            ];

            $api->utility->verifyPaymentSignature($attributes);
            $getCarts = $this->orderInterface->getAllCarts(auth()->id());
            $totalPrice = 0;
            foreach ($getCarts as $cartItem) {
                $totalPrice += $cartItem->quantity * $cartItem->productVariant->price;
            }

            // Retrieve the payment details to check the actual amount paid
            $payment = $api->payment->fetch($paymentId);
            if ($payment->amount == ($totalPrice*100)) {  // 50000 is the amount in paise for ₹500
                // Payment is verified and the amount matches
                return response()->json(['success' => true, 'message' => 'Payment verified successfully.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Payment amount mismatch.']);
            }
        } catch (\Exception $e) {
            Log::error('Razorpay verification error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Payment verification failed.']);
        }
    }
}
