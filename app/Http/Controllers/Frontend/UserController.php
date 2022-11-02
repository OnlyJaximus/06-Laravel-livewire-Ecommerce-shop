<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        return view('frontend.users.profile');
    }


    public function updateUserDetail(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'pin_code' => ['required', 'digits:5'],
            'address' => ['required', 'string', 'max:499'],
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->name,
        ]);
        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone' => $request->phone,
                'pin_code' => $request->pin_code,
                'address' => $request->address,
            ]
        );

        return redirect()->back()->with('message', 'User Profile Updated');
    }


    public function passwordCreate()
    {
        return view('frontend.users.change-password');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],  // must have a matching field of password_confirmation
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);

        if ($currentPasswordStatus) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return  redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
            return  redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}
