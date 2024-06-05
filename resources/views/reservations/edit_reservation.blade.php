@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Reservation</div>

                    <div class="card-body">
                    <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">

                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="car_name" class="col-md-4 col-form-label text-md-right">Car Name</label>
                                <div class="col-md-6">
                                    <input id="car_name" type="text" class="form-control" name="car_name" value="{{ $reservation->carDetail->carname }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">User ID</label>
                                <div class="col-md-6">
                                    <input id="user_id" type="text" class="form-control" name="user_id" value="{{ $reservation->user_id }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_name" class="col-md-4 col-form-label text-md-right">User Name</label>
                                <div class="col-md-6">
                                    <input id="user_name" type="text" class="form-control" name="user_name" value="{{ $reservation->user->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" value="{{ $reservation->start_date ? \Carbon\Carbon::parse($reservation->start_date)->format('Y-m-d') : '' }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                                <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control" name="end_date" value="{{ $reservation->end_date ? \Carbon\Carbon::parse($reservation->end_date)->format('Y-m-d') : '' }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>
                                <div class="col-md-6">
                                    <input id="message" type="text" class="form-control" name="message" value="{{ $reservation->message }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control">
                                        <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="paid" {{ $reservation->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="canceled" {{ $reservation->status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Update Reservation</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


 <!-- Modal -->
 <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this reservation?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a id="deleteButton" href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>


@endsection
