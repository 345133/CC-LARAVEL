@extends('layouts.rentcar')
@section('title', 'Car Listing')

@section('content')

@forelse ($CarDetail as $key => $data)
<section id="listing_img_slider">
  <div><img src="../uploads/{{$data->carpic}}" class="img-responsive" alt="image" width="900" height="560"></div>
  
  @if($data->carpic)
                    @php
                        $filename = basename($data->carpic);
                    @endphp

                        <div><img src="{{ route('getImg', ['filename' => $filename]) }}" class="img-responsive" alt="image" width="900" height="560"></div>
                @endif

</section>
<!--/Listing-Image-Slider-->

<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2>{{$data->carname}}</h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>Rs {{$data->carprice}}</p>Per Day
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5>{{$data->carmodel}}</h5>
              <p>Reg.Year</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5>{{$data->posttype}}</h5>
              <p>Car Type</p>
            </li>
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5>{{$data->carseats}}</h5>
              <p>Seats</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Vendor Details</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <p>Address: {{$data->address}}</p>
              </div>
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories">
                <!--Accessories-->
                <table>
                  <tbody>
                    <p>Contact Number: {{$data->personnumber}}</p>
                    <p>Shop Address: {{$data->address}}</p>
                    <p>city: {{$data->location}}</p>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="share_vehicle">
          <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
        </div>
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
          </div>
          <form action="{{ route('store-reservation') }}" method="POST">
            @csrf
            <input type="hidden" name="car_detail_id" value="{{ $data->id }}">
            <div class="form-group">
              <input type="date" class="form-control" name="start_date" placeholder="From Date (dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="date" class="form-control" name="end_date" placeholder="To Date (dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
            <div class="listing_detail_head row">
              <div class="col-md-9">
                <button type="submit" class="btn">Réserver<span class="angle_arrow">
                        <i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              </div>
            </div>
          </form>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
      </aside>
      <!--/Side-Bar-->
    </div>
    <div class="space-20"></div>
    <div class="divider"></div>
  </div>
</section>
<!--/Listing-detail-->

@empty
no data found
@endforelse
@endsection
