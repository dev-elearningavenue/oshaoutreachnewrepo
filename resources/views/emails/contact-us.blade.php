@extends('layouts.email')

@section('content')
    <p>Contact form has been submitted with the following details:</p>
    <table border="0">
        <tr>
            <th>First Name:</th>
            <td>{{ $data['first_name'] }}</td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td>{{ $data['last_name'] }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $data['phone'] }}</td>
        </tr>
        <tr>
            <th>Message</th>
            <td>{{ $data['message'] }}</td>
        </tr>

    </table>
@endsection