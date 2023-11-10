<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CouponsController extends Controller
{
    public function __construct()
    {
        if(Auth::user() && Auth::user()->type != USER_TYPE_ADMIN){
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $coupon = new Coupon();
        $coupon->code = $request->input('code');
        $coupon->type = $request->input('type');
        $coupon->amount = $request->input('amount');
        $coupon->status = $request->input('status')?1:0;
        $coupon->bdm = $request->input('bdm');
        $coupon->save();

       return redirect()->route('coupons.index')->with('success','Coupon has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request,Coupon $coupon)
    {
        $coupon->code = $request->input('code');
        $coupon->type = $request->input('type');
        $coupon->amount = $request->input('amount');
        $coupon->status = $request->input('status')?1:0;
        $coupon->bdm = $request->input('bdm');
        $coupon->save();

        return redirect()->route('coupons.index')->with('success','Coupon has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy(Request $request, Coupon $coupon)
    {

        $coupon->delete();

        return redirect()->route('coupons.index')->with('success','Coupon has been deleted Successfully!');

    }
}
