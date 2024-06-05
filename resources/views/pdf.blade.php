<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Reservation </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        /* Custom styles */
        @media print {
            @page {
                size: A3;
            }
        }

        ul {
            padding: 0;
            margin: 0 0 1rem 0;
            list-style: none;
        }

        body {
            font-family: "Inter", sans-serif;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        table th,
        table td {
            border: 1px solid silver;
        }

        table th,
        table td {
            text-align: right;
            padding: 8px;
        }

        h1,
        h4,
        p {
            margin: 0;
        }

        .container {
            padding: 20px 0;
            width: 1000px;
            max-width: 90%;
            margin: 0 auto;
        }

        .inv-title {
            padding: 10px;
            border: 1px solid silver;
            text-align: center;
            margin-bottom: 30px;
        }

        .inv-logo {
            width: 150px;
            display: block;
            margin: 0 auto;
            margin-bottom: 40px;
        }

        /* header */
        .inv-header {
            display: flex;
            margin-bottom: 20px;
        }

        .inv-header> :nth-child(1) {
            flex: 2;
        }

        .inv-header> :nth-child(2) {
            flex: 1;
        }

        .inv-header h2 {
            font-size: 20px;
            margin: 0 0 0.3rem 0;
        }

        .inv-header ul li {
            font-size: 15px;
            padding: 3px 0;
        }

        /* body */
        .inv-body table th,
        .inv-body table td {
            text-align: left;
        }

        .inv-body {
            margin-bottom: 30px;
        }

        /* footer */
        .inv-footer {
            display: flex;
            flex-direction: row;
        }

        .inv-footer> :nth-child(1) {
            flex: 2;
        }

        .inv-footer> :nth-child(2) {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="inv-title" style="background-color: rgb(54, 42, 165);">
            <h1 style="color:white;">Réeservation </h1>


        </div>
        <div class="inv-header">
            <div>




            </div>
        </div>
        <div class="inv-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>model voiture</th>
                        <th>date debut</th>
                        <th>date fin</th>
                        <th>prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h4>{{ $data['car_name']}}</h4>
                            <p>{{ $data['car_model']}}</p>
                        </td>
                        <td>{{ $data['start_date'] }}</td>
                        <td>{{ $data['end_date'] }}</td>
                        <td>{{ $data['car_price'] }} DH </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="inv-footer">
            <div>
                <!-- required -->
            </div>
            <div>


            </div>
        </div>
    </div>
</body>

</html>
