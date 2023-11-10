@if(session()->has('user_creation_status'))
    <script>
        alert("{{ session()->get('user_creation_status') }}");
    </script>
@endif

@if(session()->has('user_update_status'))
    <script>
        alert("{{ session()->get('user_update_status') }}");
    </script>
@endif

@extends('layouts.admin')

@section('title')
    All Users
@endsection

@section('content')
    <div class="row">
        <div class="offset-md-9 col-md-3">
            <a href="{{ route('admin.users.create') }}" target="_blank"
                   class="btn --btn-primary --btn-small float-right mbpx-10">Create User</a>
        </div>
    </div>
    <table class="table table-bordered table-striped" id="orders-table">
        <thead>
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $key => $user)
            <tr>
                <td>
{{--                    <strong>{{ $user->id }}</strong>--}}
                    <strong>{{ $key + 1 }}</strong>
                </td>
                <td>
                    <strong>{{ $user->first_name }}</strong>
                </td>
                <td>
                    <strong>{{ $user->last_name ?? 'N/A' }}</strong>
                </td>
                <td>
                    <strong>{{ $user->email }}</strong>
                </td>
                <td>
                    @php
                        $userType = 'N/A';
                        if($user->type == USER_TYPE_ADMIN)
                            $userType = 'Admin';
                        else if($user->type == USER_TYPE_DIGITAL_MARKETER)
                            $userType = 'Digital Marketer';
                        else if($user->type == USER_TYPE_BDM)
                            $userType = 'BDM';
                        else if($user->type == USER_TYPE_SUPPORT)
                            $userType = 'Support';
                    @endphp
                    <strong>{{ $userType }}</strong>
                </td>
                <td>
                    @if($user->status == 1)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-warning">Inactive</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" target="_blank" class="send-comm">
                        <button style="font-size: 12px;padding: 5px 4px;" class="btn --btn-primary --btn-small">
                            Edit
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <style>
        form input[type=date] {
            color: #666666;
            padding: 10px 20px;
            height: 44px;
            width: 100%;
            font-size: 14px;
            border: 1px solid #eeeeee;
            background: #ffffff;
            border-radius: 4px;
            position: relative;
            z-index: 4;
        }

        .badge {
            padding: 3px 7px;
            border-radius: 15px;
            font-size: 11px;
            margin-top: 5px;
            display: inline-block;
        }

        .badge-complete {
            background: #005384;
            color: #ffffff;
        }

        .badge-incomplete {
            background: #74787E;
            color: #ffffff;
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#orders-table').DataTable({
                paging: true,
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100, 250, 500, -1], [10, 25, 50, 100, 250, 500, "All"]],
                order: [[0, 'asc']]
            });

            $('#password, #password_confirmation').change(function(){
                $('#password').val($('#password').val().substring(0,10));
                $('#password_confirmation').val($('#password_confirmation').val().substring(0,10));
            });
            $('#password, #password_confirmation').blur(function(){
                $('#password').val($('#password').val().substring(0,10));
                $('#password_confirmation').val($('#password_confirmation').val().substring(0,10));
            });

            function checkForm() {
                var password1 = document.getElementById('password');
                var password2 = document.getElementById('password_confirmation');

                var re = /(?=.*[a-zA-Z])(?=.*\d).+/;


                if (password1.value.length < 8) {
                    password1.setCustomValidity('Password must contains at least 8 characters.');
                    return false;
                } else if (!re.test(password1.value)){
                    password1.setCustomValidity('Password must contains at least 1 number and 1 letter.');
                    return false;
                }else {
                    password1.setCustomValidity('');

                    if (password1.value === password2.value) {
                        password2.setCustomValidity('');
                    } else {
                        password2.setCustomValidity('Passwords must match');
                        return false;
                    }
                }

                if($('form')[0].checkValidity()) {
                    {{--fbq('track', 'InitiateCheckout', {value: '{{ $total }}',currency: 'USD'});--}}
                        return true;
                }

                return false;
            }

            $('#order_details_form').submit(function(e){
                checkForm();
                // e.preventDefault();
                return false;
            });
        });
    </script>
@endsection

