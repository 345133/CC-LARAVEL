@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@section('content')

<div class="col-md-11 col-md-push-1">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addCarModal">Ajouter une voiture</button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Car Name</th>
                <th>Price Per Day</th>
                <th>Seats</th>
                <th>Model</th>
                <th>Type</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($CarDetail as $key => $data)
                        <td>
                @if($data->carpic)
                    @php
                        $filename = basename($data->carpic);
                    @endphp
                    <img src="{{ route('getImg', ['filename' => $filename]) }}" class="img-responsive"
                        alt="Image" style="max-width: 100px; max-height: 100px;" />
                @endif
            </td>



                <td><a href="{{ url('cardetail/' . $data->id) }}">{{ $data->carname }}</a></td>
                <td>{{ $data->carprice }} RS</td>
                <td>{{ $data->carseats }}</td>
                <td>{{ $data->carmodel }}</td>
                <td>{{ $data->posttype }}</td>
                <td>{{ $data->location }}</td>
                <td>
                    <a href="{{ url('cardetail/' . $data->id) }}" target="_blank" class="btn btn-info">View Details</a>
                    <a href="{{ url('editcar/' . $data->id) }}" class="btn btn-primary">Edit</a> <!-- Edit button -->
                    <button type="button" class="btn btn-danger" onclick="showConfirmationModal('{{ route('cars.destroy', $data->id) }}')">Delete</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">No data found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

<!-- Delete Car Modal -->
<div class="modal fade" id="deleteCarModal" tabindex="-1" role="dialog" aria-labelledby="deleteCarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCarModalLabel">Delete Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this car?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteCarForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

function showConfirmationModal(url) {
        $('#deleteCarForm').attr('action', url);
        $('#deleteCarModal').modal('show');
    }

    function printAllCars() {
    // Create a new window for printing
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Tous Les Voitures</title>');
    printWindow.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"></head>');
    printWindow.document.write('<body><div class="container"><h1 class="mt-5 mb-4">Tous Les Voitures</h1>');
    printWindow.document.write('<table class="table table-striped"><thead><tr><th>Image</th><th>Name</th><th>Price Per Day</th><th>Seats</th><th>Model</th><th>Type</th><th>Location</th></tr></thead><tbody>');

    // Loop through table rows to collect car details
    $('table tbody tr').each(function() {
        var image = $(this).find('img').attr('src');
        var name = $(this).find('td:nth-child(2)').text();
        var price = $(this).find('td:nth-child(3)').text();
        var seats = $(this).find('td:nth-child(4)').text();
        var model = $(this).find('td:nth-child(5)').text();
        var type = $(this).find('td:nth-child(6)').text();
        var location = $(this).find('td:nth-child(7)').text();

        // Append car details to the table
        printWindow.document.write('<tr><td><img src="' + image + '" class="img-fluid" style="max-width: 100px; max-height: 100px;"></td>' +
                                    '<td>' + name + '</td>' +
                                    '<td>' + price + '</td>' +
                                    '<td>' + seats + '</td>' +
                                    '<td>' + model + '</td>' +
                                    '<td>' + type + '</td>' +
                                    '<td>' + location + '</td></tr>');
    });

    // Close the table and body
    printWindow.document.write('</tbody></table></div></body></html>');

    // Close the print window
    printWindow.document.close();
    printWindow.print();
}

</script>

<!-- Add Car Modal -->
<div class="modal fade" id="addCarModal" tabindex="-1" role="dialog" aria-labelledby="addCarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarModalLabel">Add New Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding a new car -->
                <form id="addCarForm" method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="carname">Car Name</label>
                        <input type="text" class="form-control" id="carname" name="carname" required>
                    </div>
                    <div class="form-group">
                        <label for="carprice">Car Price Per Day</label>
                        <input type="number" class="form-control" id="carprice" name="carprice" required>
                    </div>
                    <div class="form-group">
                        <label for="carmodel">Car Model</label>
                        <input type="text" class="form-control" id="carmodel" name="carmodel" required>
                    </div>
                    <div class="form-group">
                        <label for="carseats">Car Seats</label>
                        <input type="number" class="form-control" id="carseats" name="carseats" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="personnumber">Your Phone Number</label>
                        <input type="tel" class="form-control" id="personnumber" name="personnumber" value="{{ Auth::user()->number }}" required>
                    </div>
                    <div class="form-group">
                        <label for="carpic">Car Image</label>
                        <input type="file" class="form-control" id="carpic" name="carpic">

                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Add Car</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
