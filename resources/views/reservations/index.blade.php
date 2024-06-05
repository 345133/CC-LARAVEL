@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="padding: 40px;background-color:rgb(176, 182, 232);">
            <div class="col-md-12" >
                <div class="card">


                    <div class="card-body" style="background-color:rgb(157, 163, 202);">
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>id voiture</th>
                                    <th>id client</th>

                                    <th>date entre </th>
                                    <th>End sortie</th>

                                    <th>action</th>
                                    <!-- Add more table headers if needed -->
                                </tr>
                            </thead>
                            <tbody>
    @foreach($reservations as $reservation)
        <tr>

            <td>{{ $reservation->user_id }}</td>
            <td>{{ $reservation->user_id }}</td>
            <td>{{ $reservation->start_date }}</td>
            <td>{{ $reservation->end_date }}</td>


            <td>
                <a href="{{ route('reservations.pdf', $reservation->id) }}" target=”_blank” class="btn btn-primary"> PDF</a>
            </td>



        </tr>
    @endforeach
</tbody>


                        </table>
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
                    Are you sure you want to delete this car?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a id="deleteButton" href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>




    <script>
     function showConfirmationModal(deleteUrl) {
        $('#confirmationModal').modal('show');
        $('#deleteButton').attr('href', deleteUrl);
    }
</script>


<script>
   function deleteReservationAndRedirect(deleteUrl) {
        // Send an AJAX request to delete the reservation
        $.ajax({
            url: deleteUrl,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // If deletion is successful, redirect to the specified URL
                window.location.href = '{{ route("reservations") }}';
            },
            error: function(xhr, status, error) {
                // Handle errors if any
                console.error(xhr.responseText);
            }
        });
    }
</script>
@endsection
