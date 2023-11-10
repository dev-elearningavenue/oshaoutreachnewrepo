<?php

namespace App\Http\Requests;

use App\Models\Coupon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request, Coupon $coupon)
    {
        $rules = array();
        switch ($this->method()) {
            case 'POST':
                $rules['code'] = 'required|string|max:100|unique:coupons';
                if($request->type == (string) COUPON_TYPE_PERCENT)
                    $rules['amount'] = 'required|numeric|lt:100';
                else
                    $rules['amount'] = 'required|numeric';
                $rules['bdm'] = 'numeric|nullable';
                break;
            case 'PUT':
            case 'PATCH':
            $rules['code'] = ['required', 'string', 'max:100', Rule::unique('coupons')->ignore($this->coupon->id)];
            if($request->type == (string) COUPON_TYPE_PERCENT)
                $rules['amount'] = 'required|numeric|lt:100';
            else
                $rules['amount'] = 'required|numeric';
            $rules['bdm'] = 'numeric|nullable';
            default:
                break;
        }
        return $rules;
    }
}
