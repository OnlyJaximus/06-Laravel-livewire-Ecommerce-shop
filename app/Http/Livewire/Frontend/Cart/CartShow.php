<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;




    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->quantity > 1) {

                $cartData->decrement('quantity');
                session()->flash('message', 'Quantity Updated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                session()->flash('message', 'Quantity cannot be less than 1');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity cannot be less than 1',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            session()->flash('message', 'Something Went Wrong!');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',

                'status' => 404
            ]);
        }
    }


    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',  $cartId)->where('user_id', auth()->user()->id)->first();

        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor =  $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {;
                    $cartData->increment('quantity');
                    session()->flash('message', 'Quantity Updated');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    session()->flash('message', 'Only ' . $productColor->quantity . ' Quantity Available');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $productColor->quantity . ' Quantity Available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cartData->product->quantity >  $cartData->quantity) {
                    $cartData->increment('quantity');
                    session()->flash('message', 'Quantity Updated');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Updated',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    session()->flash('message', 'Only ' . $cartData->product->quantity . ' Quantity Available');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $cartData->product->quantity . ' Quantity Available',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }
        } else {
            session()->flash('message', 'Something Went Wrong');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }


    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if ($cartRemoveData) {
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
            session()->flash('message', 'Cart Item Removed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Item Removed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            session()->flash('message', 'Something Went Wrong');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 400
            ]);
        }
    }



    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart

        ]);
    }
}
