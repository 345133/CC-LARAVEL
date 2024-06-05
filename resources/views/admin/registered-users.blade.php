@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Registered Users</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sr #</th>
                <th>Username</th>
                <th>Email</th>
                <th>Number</th>
                <th>City</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $key => $data)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->number}}</td>
                <td>{{$data->city}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->updated_at}}</td>
                <td>
                    <a href="" target="_blank" class="btn btn-info">View Details</a>
                    <a href="" class="btn btn-primary">Edit</a> 
                    <button type="button" class="btn btn-danger" onclick="showConfirmationModal()">Delete</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No data found</td>
            </tr>
            @endforelse
        </tbody
    </table>
</div>
@endsection
