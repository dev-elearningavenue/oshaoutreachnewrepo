<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'first_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'last_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'email' => 'email|required|unique:users',
            'contact_no' => 'required|min:10|max:15',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'zip_code' => 'required',
            'state' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name  = $request->input('last_name');
        $user->email      = $request->input('email');
        $user->contact_no = $request->input('contact_no');
        $user->password   = bcrypt($request->input('password'));
        $user->address    = $request->input('address');
        $user->zip_code   = $request->input('zip_code');
        $user->state      = $request->input('state');
        $user->city       = $request->input('city');
        $user->country    = $request->input('country');
        $user->save();

        Auth::login($user);

        if (Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

        return redirect()->route('user.profile');
    }

    public function getSignin()
    {
        return view('user.signin', ['login_failed' => false]);
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile');
        }
        return view('user.signin', ['login_failed' => true]);
    }


    public function getProfile()
    {
        $orders = Auth::user()->orders;

        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('user.profile', ['orders' => $orders]);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
