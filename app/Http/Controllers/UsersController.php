<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form_fields = Session::get('form_fields');
        return view('admin.users.create', ['form_fields' => $form_fields]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // SET inputs in Session
        $form_fields = [];
        $form_fields['first_name'] = $request->input('first_name');
        $form_fields['last_name'] = $request->input('last_name');
        $form_fields['email'] = $request->input('email');
        $form_fields['password'] = $request->input('password');
        $form_fields['password_confirmation'] = $request->input('password_confirmation');
        $form_fields['type'] = $request->input('type');
        $form_fields['status'] = $request->input('status');
        Session::put('form_fields', $form_fields);

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
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:8|max:15|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'type' => [
                'required',
                Rule::in([1, 2, 3, 4])
            ],
            'status' => [
                'required',
                Rule::in([0, 1])
            ]
        ],
            [
                'password.regex' => 'Password must contains 1 number and 1 letter.'
            ]);

        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'type' => $request->input('type'),
            'status' => $request->input('status', 0)
        ]);

        //Delete Session data
        Session::forget('form_fields');

        return redirect()->route('admin.users')->with('user_creation_status', 'User successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // SET inputs in Session
        $edit_user_fields = [];
        $edit_user_fields['first_name'] = $request->input('first_name');
        $edit_user_fields['last_name'] = $request->input('last_name');
        $edit_user_fields['email'] = $request->input('email');
        $edit_user_fields['password'] = $request->input('password');
        $edit_user_fields['password_confirmation'] = $request->input('password_confirmation');
        $edit_user_fields['type'] = $request->input('type');
        $edit_user_fields['status'] = $request->input('status');
        Session::put('edit_user_fields', $edit_user_fields);

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
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8|max:15|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'type' => [
                'required',
                Rule::in([1, 2, 3, 4])
            ],
            'status' => [
                'required',
                Rule::in([0, 1])
            ]
        ],
            [
                'password.regex' => 'Password must contains 1 number and 1 letter.'
            ]);

        $input = $request->except(['_token', 'password', 'password_confirmation']);

        $user->update($input);

        if($request->input('password') !== null) {
            $user->password = bcrypt($request->input('password'));

            $user->save();
        }

        //Delete Session data
        Session::forget('edit_user_fields');

        return redirect()->route('admin.users')->with('user_update_status', 'User successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
