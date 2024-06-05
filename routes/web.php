<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CarDetailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route to display the registration form

Route::post('/contact/send', [ContactController::class, 'storeContact'])->name('contact.send');
Route::delete('/delete-contact-email/{id}', [ContactController::class, 'delete'])->name('delete.contact.email');


Route::get('/checkout', [ReservationController::class, 'checkout'])->name('checkout');
Route::post('/session', [ReservationController::class, 'session'])->name('session');
Route::get('/success', [ReservationController::class, 'success'])->name('success');



Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us');
Route::get('/car-listing', [CarDetailController::class, 'index'])->name('car.listing');
Route::get('/contact', [HomeController::class, 'contactUs'])->name('contact');
Route::get('reservation', [CarDetailController::class, 'reservation'])->name('reservation');
Route::get('upload-car', [CarDetailController::class, 'create'])->name('upload.car');
Route::post('/download-invoice', [ReservationController::class, 'downloadInvoice'])->name('download_invoice');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
Route::get('/subscribesent', [HomeController::class, 'subscribesent'])->name('subscribesent');
//Route::post('/contact/send', [HomeController::class, 'send'])->name('contact.send');
Route::get('/contactsent', [HomeController::class, 'contactsent'])->name('contactsent');


Route::get('/images/{filename}', [ReservationController::class, 'getImg'])->name('getImg');


Route::get('/', function () {
    return view('index');
});
Route::get('index', function () {
    return view('index');
});



Route::get('adminlogin', function () {
    // Check if the user is authenticated and has the 'admin' role
    if (Auth::check() && Auth::user()->role == 'admin') {
        // If the user is an admin, redirect them to the dashboard
        return view('admin/dashboard');
    } else {
        // If the user is not an admin or not authenticated, return the login view
        return view('admin/dashboard');
    }
});



Route::resource('car_details', CarDetailController::class);


// Route::get('upload-car', function () {
//     return view('uploadcar');
// });

// Route::get('car-listing', function () {
//     return view('car-listing');
// });


// Route::post('post-to-server',[FileController::class, 'index']);



Auth::routes();

Route::get('dashboard', function () {
    // Check if the user is authenticated
    if (Auth::check()) {
        // Check if the user is an admin (assuming isAdmin() method exists in User model)
        if (Auth()->user() && Auth()->user()->role == 'admin') {
            // User is authenticated and is an admin, show the dashboard
            return view('admin/dashboard');
        } else {
            // User is authenticated but not an admin, redirect to home or show an error page
            return redirect('/');
        }
    } else {
        // User is not authenticated, redirect to login page
        return redirect('/');
    }
})->middleware('auth')->name('dashboard');


Route::delete('/cars/{destroy}', [CarDetailController::class, 'destroy'])->name('cars.destroy');

Route::post('/cars/add', [CarDetailController::class, 'storeAdmin'])->name('cars.store');
Route::post('dash-edit/{carid}', [CarDetailController::class, 'dashEdit'])->name('dash.edit');


Route::get('cardetail/{car_details}', [CarDetailController::class, 'show']);
Route::get('myposts/{car_details}', [CarDetailController::class, 'userpost']);
Route::get('editcar/{CarDetail}', [CarDetailController::class, 'dashEdit']);
Route::get('deletecar/{car_details}', [CarDetailController::class, 'destroy']);

Route::put('updatecar/{car_details}', [CarDetailController::class, 'update'])->name('updatecar');
Route::put('/cars/{id}/upload-image', [CarDetailController::class, 'uploadImage'])->name('cars.upload-image');

Route::get('/withdriver', [CarDetailController::class, 'withdriver'])->name('withdriver');
Route::get('/withoutdriver', [CarDetailController::class, 'withdriver'])->name('withoutdriver');
Route::get('reg-users', [RegisterController::class, 'usersdata']);
Route::post('store-car-detail',[CarDetailController::class,'store']);
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');




Route::get('/reservations/show/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
Route::put('/reservations/update/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/delete/{reservation}', 'ReservationController@destroy')->name('reservations.destroy');



// Users
Route::get('/dashboard/registered-users', [UserController::class, 'index'])->name('registered.users');
Route::get('/dashboard/allcars', [CarDetailController::class, 'allcars'])->name('allcars');
Route::get('/dashboard/reservations', [ReservationController::class, 'showAllReservation'])->name('reservations');
Route::get('/dashboard/contactlist', [UserController::class, 'contactlist'])->name('contactlist');


Route::get('/reservations/{id}/pdf', [ReservationController::class, 'viewPDF'])->name('reservations.pdf');
Route::get('/reservations/{id}/edit', [ReservationController::class, 'editReservation'])->name('reservations.edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/reservations/store', [ReservationController::class, 'storeReservation'])->name('store-reservation');





