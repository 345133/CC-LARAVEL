@extends('layouts.admin')

@section('content')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reservation Details</div>

                    <div class="card-body">
                        <p><strong>Car Name:</strong> {{ $reservation->carDetail->carname }}</p>
                        <p><strong>User ID:</strong> {{ $reservation->carDetail->user_id }}</p>
                        <p><strong>User Name:</strong> {{ $reservation->user->name }}</p>
                        <p><strong>Start Date:</strong> {{ $reservation->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $reservation->end_date }}</p>
                        <p><strong>Message:</strong> {{ $reservation->message }}</p>

                        <!-- Add more details as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
