@extends('layouts.email')

@section('content')
    <p>Group Enrollment form has been submitted with the following details:</p>
    <table border="0">
        <tr>
            <th>Company Name:</th>
            <td>{{ $data['company_name'] }}</td>
        </tr>
        <tr>
            <th>No. of Employees:</th>
            <td>{{ $data['number_of_employees'] }}</td>
        </tr>
        <tr>
            <th>Company Type:</th>
            <td>{{ $data['company_type'] }}</td>
        </tr>
        <tr>
            <th>Course Name:</th>
            <td>{{ $data['course_name'] }}</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>{{ $data['address'] }}</td>
        </tr>
        <tr>
            <th>City:</th>
            <td>{{ $data['city'] }}</td>
        </tr>
        <tr>
            <th>State:</th>
            <td>{{ $data['state'] }}</td>
        </tr>
        <tr>
            <th>Zip Code:</th>
            <td>{{ $data['zip_code'] }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $data['phone'] }}</td>
        </tr>
        <tr>
            <th>Contact Person:</th>
            <td>{{ $data['contact_person'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $data['email'] }}</td>
        </tr>

    </table>
@endsection