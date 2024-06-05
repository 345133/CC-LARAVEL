<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Reservation created successfully!</h4>
            <p>Your invoice has been generated. You can download it using the button below:</p>
            <form id="downloadForm" action="{{ route('download_invoice') }}" method="post">
                @csrf
                <input type="hidden" name="pdfPath" value="{{ $pdfPath }}">
                <button id="downloadButton" type="submit" class="btn btn-primary">Download Invoice</button>
            </form>
            <hr>
            <a href="{{ route('home') }}" class="btn btn-secondary">Go to Home</a>
        </div>
    </div>
</body>
</html>
