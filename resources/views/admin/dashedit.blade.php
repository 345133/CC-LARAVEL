@extends('layouts.admin')

@section('content')

@section('title', 'Edit Car')

<!-- Page Header -->
<section class="page-header contactus_page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header_wrap">
                    <div class="page-heading">
                        <h1>Edit Car Details</h1>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('allcars') }}">Listed Vehicles</a></li>
                        <li>Edit Car Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark Overlay -->
    <div class="dark-overlay"></div>
</section>
<!-- /Page Header -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @forelse ($CarDetail as $key=>$data)
                <form id="contact" action="{{ route('updatecar', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <h2><a>{{$data->carname}}</a></h2>
    <h4><a>Provide The Details</a></h4>

    @if($data->carpic)
                    @php
                        $filename = basename($data->carpic);
                    @endphp

                        <div class="recent_post_img">
                    <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <img src="{{ route('getImg', ['filename' => $filename]) }}" alt="image" style="max-width: 300px; max-height: 300px;">
        </div>
                @endif

                    <div class="form-group">
                    <label for="carname">Car Name</label>
                        <input class="form-control" placeholder="Car name" type="text" name="carname" value="{{ $data->carname }}">
                    </div>
                    
                    <div class="form-group">
                    <label for="carprice">Car Price Per Day</label>
                        <input class="form-control" placeholder="Car Price Per Day" type="number" name="carprice" value="{{ $data->carprice }}">
                    </div>
                    
                    <div class="form-group">
                    <label for="carmodel">Car Model</label>
                        <input class="form-control" placeholder="Car Model" type="number" name="carmodel" value="{{ $data->carmodel }}" required autofocus>
                    </div>

                    <div class="form-group">
                    <label for="carseats">Car Seats</label>
                        <input class="form-control" placeholder="Car Seats" type="number" name="carseats" value="{{ $data->carseats }}" required autofocus>
                    </div>

                    <div class="form-group">
                    <label for="address">Address</label>
                        <input class="form-control" placeholder="Address" name="address" type="text" value="{{ $data->address }}" required>
                    </div>
                    
                    <div class="form-group">
                    <label for="personnumber">Your Phone Number</label>
                        <input class="form-control" placeholder="Your Phone Number" value="{{ Auth::user()->number }}" name="personnumber" type="tel" required>
                    </div>

                    <input style="display:none"  value='{{ Auth::user()->id }}'  name="user_id"/>
                    
             

                    <div class="form-group">
                    <label for="personnumber">Location</label>
                    <input class="form-control" placeholder="Location" name="location" type="text" value="{{ $data->location }}" required>
                    </div>

                          <fieldset>
          <div class="form-group">
                    <button class="btn" type="submit" name="send" type="submit">Upload </button>
                  </div>
          </fieldset>
                </form>
                @empty
                <p>No data found</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection
