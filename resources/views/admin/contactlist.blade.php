<!-- resources/views/dashboard/contactlist.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Contact Emails</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Message</th>
                    <th>Timestamp</th>
                    <th>Action</th> <!-- New column for the delete button -->
                </tr>
            </thead>
            <tbody>
                @foreach ($contactEmails as $email)
                <tr>
                    <td>{{ $email->fullname }}</td>
                    <td>{{ $email->email }}</td>
                    <td>{{ $email->contactno }}</td>
                    <td>{{ $email->message }}</td>
                    <td>{{ $email->created_at }}</td>
                    <td>
                        <form action="{{ route('delete.contact.email', ['id' => $email->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
