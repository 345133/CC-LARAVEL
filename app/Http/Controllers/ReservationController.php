<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\CarDetail;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;


class ReservationController extends Controller
{


    public function getImg($filename)
    {
   
        $image = Storage::disk('images')->get($filename);
   
        $mime = Storage::disk('images')->mimeType($filename);
   
        return (new Response($image, 200))->header('Content-Type', $mime);
    }

    public function store(Request $request)
    {
        $request->validate([
            'carname' => 'required|string',
            'carprice' => 'required|string',
            'carmodel' => 'required|string',
            'carseats' => 'required|string',
            'address' => 'required|string',
            'personnumber' => 'required|string',
            'carpic' => 'required|string',
            'posttype' => 'required|string',
            'location' => 'required|string',
        ]);

        $carDetail = new CarDetail();
        $carDetail->user_id = auth()->user()->id; // Assuming you're using authentication
        $carDetail->carname = $request->input('carname');
        $carDetail->carprice = $request->input('carprice');
        $carDetail->carmodel = $request->input('carmodel');
        $carDetail->carseats = $request->input('carseats');
        $carDetail->address = $request->input('address');
        $carDetail->personnumber = $request->input('personnumber');
        $carDetail->carpic = $request->input('carpic');
        $carDetail->posttype = $request->input('posttype');
        $carDetail->location = $request->input('location');
        
        $carDetail->save();

        return redirect()->route('car-listing')->with('success', 'Car detail has been added successfully!');
    }


    public function downloadInvoice(Request $request)
{
    $pdfPath = $request->input('pdfPath');

    return response()->download($pdfPath);
}


public function storeReservation(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'car_detail_id' => 'required|exists:car_details,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'message' => 'required|string',
        // Add validation rules for other reservation fields
    ]);

    // Create a new reservation
    $reservation = Reservation::create([
        'user_id' => auth()->user()->id, // Assuming you're using authentication
        'car_detail_id' => $request->input('car_detail_id'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        'message' => $request->input('message'),
        // Add other reservation fields here
    ]);

    // Store reservation data in the session
    session(['reservation_id' => $reservation->id]);

    // Redirect to the checkout route
    return redirect()->route('checkout');
}

public function checkout()
{
    // Retrieve reservation data from session
    $reservationId = session('reservation_id');
    $reservation = Reservation::findOrFail($reservationId);
    $carDetail = CarDetail::findOrFail($reservation->car_detail_id);

    // Pass reservation data to the checkout view
    return view('checkout', compact('reservation', 'carDetail'));
}

public function session()
{
    \Stripe\Stripe::setApiKey(config('stripe.sk'));

    // Retrieve reservation data from session
    $reservationId = session('reservation_id');
    $reservation = Reservation::findOrFail($reservationId);
    $carDetail = CarDetail::findOrFail($reservation->car_detail_id);

    // Create the Stripe checkout session
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'mad',
                'product_data' => [
                    'name' => 'Reservation Payment',
                ],
                'unit_amount' => $carDetail->carprice * 100, // Convert to smallest currency unit (e.g., cents)
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('success'),
        'cancel_url' => route('checkout'),
    ]);

    // Redirect the user to the Stripe checkout page
    return redirect()->away($session->url);
}

public function success()
{
    // Generate and display the PDF invoice
    return $this->generatePDF();
}

public function generatePDF()
{
    // Retrieve the reservation details from the session
    $reservationId = session('reservation_id');
    $reservation = Reservation::findOrFail($reservationId);
    $carDetail = CarDetail::findOrFail($reservation->car_detail_id);

    // Prepare data for PDF
    $data = [
        'invoice_id' => $reservation->id,
        'user_name' => Auth::user()->name,
        'user_email' => Auth::user()->email,
        'user_address' => Auth::user()->address,
        'car_name' => $carDetail->carname,
        'car_price' => $carDetail->carprice,
        'car_model' => $carDetail->carmodel,
        'car_seats' => $carDetail->carseats,
        'person_number' => $carDetail->personnumber,
        'start_date' => $reservation->start_date,
        'end_date' => $reservation->end_date,
        'price' => $carDetail->carprice,
        'status' => $reservation->status,
    ];

    // Generate PDF
    $pdf = PDF::loadView('pdf', ['data' => $data]);
    $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf->setPaper('a4', 'portrait');

    // Save PDF to a temporary file
    $pdfPath = storage_path('app/reservation_' . $reservation->id . '.pdf');
    $pdf->save($pdfPath);

    // Return the success view with the PDF path
    return View::make('reservation_success', compact('pdfPath'));
}

    public function deleteReservation($id)
{
    // Find the reservation by ID
    $reservation = Reservation::findOrFail($id);

    // Delete the reservation
    $reservation->delete();

    return redirect()->route('reservation')->with('success', 'Reservation deleted successfully!');
}

    public function showAllReservation ()
{
    // Retrieve all reservations along with their associated car details
    $reservations = Reservation::with('carDetail')->get();

    // Pass the reservations data to the view
    return view('reservations.index', compact('reservations'));
}


public function viewPDF($id)
{
    // Find the reservation by ID
    $reservation = Reservation::findOrFail($id);

    $userName = Auth::user()->name;
    $userEmail = Auth::user()->email;
    $userAddress = auth()->user()->address;

    // Retrieve car details associated with the reservation
    $carDetail = $reservation->carDetail;

    $data = [
        'invoice_id' => $id,
        'user_name' => $userName,
        'user_email' => $userEmail,
        'user_address' => $carDetail->address,
        'car_name' => $carDetail->carname,
        'car_price' => $carDetail->carprice,
        'car_model' => $carDetail->carmodel,
        'car_seats' => $carDetail->carseats,
        'person_number' => $carDetail->personnumber,
        'start_date' => $reservation->start_date,
        'end_date' => $reservation->end_date,
        'price' => $carDetail->carprice, 
        'status' => $reservation->status,
    ];

    // Generate PDF
    $pdf = Pdf::loadView('pdf', ['data' => $data]);
    $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    $pdf->setPaper('a4', 'portrait');

    return $pdf->stream('reservation.pdf');
}


public function editReservation($id)
{

     // Find the reservation by ID
    $reservation = Reservation::findOrFail($id);

    // Pass the $reservation variable to the view
    return view('reservations.edit_reservation', compact('reservation'));
}


public function update(Request $request, $id)
{
     // Find the reservation by ID and user ID
     $reservation = Reservation::where('id', $id)
     ->where('user_id', Auth::id()) // Ensure the reservation belongs to the authenticated user
     ->firstOrFail();

 // Update the reservation with the new data
 $reservation->update([
     'start_date' => $request->input('start_date'),
     'end_date' => $request->input('end_date'),
     'message' => $request->input('message'),
     'status' => $request->input('status'),
     // Update other fields as needed
 ]);

 // Update car name only if the car detail is associated with this reservation
 if ($reservation->carDetail) {
     $reservation->carDetail->update([
         'carname' => $request->input('car_name'),
         // Update other car details as needed
     ]);
 }


    // Redirect back to the edit page with a success message
    return redirect()->route('reservations', $reservation->id)->with('success', 'Reservation updated successfully!');
}


public function destroy($id)
{
    // Find the reservation by ID and user ID
    $reservation = Reservation::where('id', $id)
        ->where('user_id', Auth::id()) // Ensure the reservation belongs to the authenticated user
        ->firstOrFail();

    // Delete the reservation
    $reservation->delete();

    // Redirect back to some appropriate page with a success message
    return redirect()->route('reservations')->with('success', 'Reservation deleted successfully!');
}

public function show($id)
{
    $reservation = Reservation::findOrFail($id);
    return view('reservations.show', ['reservation' => $reservation]);
}


}
