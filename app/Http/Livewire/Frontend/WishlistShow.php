<?php

namespace App\Http\Livewire\Frontend;

use App\Models\WishList;
use Livewire\Component;

class WishlistShow extends Component
{

    public function removeWislistItem(int $wishlistId)
    {
        // dd($wishlistId);

        $wishlist = WishList::where('user_id', auth()->user()->id)->where('id', $wishlistId)->first();
        $wishlist->delete();

        $this->emit('wishlistAddedUpdated');

        session()->flash('message', 'Wishlist Item Removed Successfully');

        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist Item Removed Successfully',
            'type' => 'success',
            'status' => 200
        ]);
    }



    public function render()
    {

        $wishlist =  WishList::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' =>   $wishlist
        ]);
    }
}
