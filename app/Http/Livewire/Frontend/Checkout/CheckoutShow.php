<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;
    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnLineOrder'
    ];

    public function paidOnLineOrder($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = 'Paid by Paypal';
        $codOrder = $this->placeOrder();

        if ($codOrder) {

            // delete everything from the card after the order
            Cart::where('user_id', auth()->user()->id)->delete();

            try {
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                // Mail Sent Successfully
            } catch (\Exception $e) {
                //Something went wrong
            }

            session()->flash('message', 'Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('thank-you');
        } else {


            session()->flash('message', 'Something went wrong');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|max:10',
            'pincode' => 'required|string|max:10|min:5',
            'address' => 'required|string|max:500',
        ];
    }


    public function placeOrder()
    {
        // $validatedData = $this->validate();
        $this->validate();
        $oder =  Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'blexPost-' . Str::random(10),
            'fullname' => $this->fullname,

            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,

        ]);

        foreach ($this->carts as $cartItem) {
            $orderItems = OrderItem::create([
                'order_id' => $oder->id,
                'product_id' => $cartItem->product_id,
                'product_color_id'  => $cartItem->product_color_id,
                'quantity'  => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,
            ]);

            if ($cartItem->product_color_id != NULL) {
                $cartItem->productColor->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->product->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }

        return   $oder;
    }


    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();

        if ($codOrder) {
            // delete everything from the card after the order
            Cart::where('user_id', auth()->user()->id)->delete();
            try {
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                // Mail Sent Successfully
            } catch (\Exception $e) {
                //Something went wrong
            }

            session()->flash('message', 'Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('thank-you');
        } else {


            session()->flash('message', 'Something went wrong');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name; // automatically fills the submission field for the name
        $this->email = auth()->user()->email;

        $this->phone = auth()->user()->userDetail->phone;
        $this->address = auth()->user()->userDetail->address;
        $this->pincode = auth()->user()->userDetail->pin_code;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount

        ]);
    }
}
