<?php

namespace App\Http\Livewire\Frontend;

use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;

    // wishlistAddedUpdated  from WishlistShow.blade.php
    protected $listeners = ['wishlistAddedUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if (Auth::check()) {
            return $this->wishlistCount =  WishList::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->wishlistCount = 0;
        }
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.frontend.wishlist-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
