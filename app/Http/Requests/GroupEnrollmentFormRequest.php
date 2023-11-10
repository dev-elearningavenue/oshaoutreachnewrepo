<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\GroupEnrollmentEnquiries;
use Illuminate\Support\Facades\Session;

class GroupEnrollmentFormRequest extends Request
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
    public function rules(\Illuminate\Http\Request $request)
    {
        // Get Group En
        $id = Session::get('group_enrollment_enquiry_id');

        if($id){
            $enquiry = GroupEnrollmentEnquiries::find($id);
        } else {
            $enquiry = new GroupEnrollmentEnquiries();
        }

        $enquiry->company_name    = $request->input('company_name');
        $enquiry->no_of_employees = $request->input('number_of_employees');
        $enquiry->company_type    = $request->input('company_type');
        $enquiry->course_name     = $request->input('course_name');
        $enquiry->email           = $request->input('email');
        $enquiry->address         = $request->input('address');
        $enquiry->city            = $request->input('city');
        $enquiry->state           = $request->input('state');
        $enquiry->zip_code        = $request->input('zip_code');
        $enquiry->contact_no      = $request->input('phone');
        $enquiry->contact_person  = $request->input('contact_person');
        $enquiry->client_of       = WEB_CREDIT;
        $enquiry->save();

        Session::put('group_enrollment_enquiry_id', $enquiry->id);

        return [
            'company_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'contact_person' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'number_of_employees' => "required|numeric",
            'address' => 'required|min:3',
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'zip_code' => 'required|min:5',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:15',
        ];
    }
}
