<?php

namespace App\Http\Controllers;

use App\Models\CarDetail;
use App\Models\User;
use App\Models\CarImage;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class CarDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CarDetail = CarDetail::with('images')->get();

        return view('car-listing', compact('CarDetail'));
    }


    public function uploadImage(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'carimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust validation rules as needed
    ]);

    // Get the car instance
    $car = CarDetail::findOrFail($id);

    // Handle the file upload
    if ($request->hasFile('carimage')) {
        $image = $request->file('carimage');
        $imageName = $id . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/cars'), $imageName);
        
        // Save the image path to the car record in the database
        $car->image_path = 'images/cars/' . $imageName;
        $car->save();
    }

    return redirect()->route('allcars')->with('success', 'Image uploaded successfully!');

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploadcar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($contents = $request->file('carpic')) {
            $name = $contents->getClientOriginalName();
            $contents->move('uploads', $name);



            // $request->validate([
            //     'user_id'=>'required',
            //     'carname'=>'required',
            //     'carprice'=>'required',
            //     'carmodel'=>'required',
            //     'carseats'=>'required',
            //     'address'=>'required',
            //     'personnumber'=>'required',
            //     'posttype'=>'required',
            //     'location'=>'required',

            // ]);

            $carDetail = new CarDetail([
                'user_id' => $request->get('user_id'),
                'carname' => $request->get('carname'),
                'carprice' => $request->get('carprice'),
                'carmodel' => $request->get('carmodel'),
                'carseats' => $request->get('carseats'),
                'address' => $request->get('address'),
                'personnumber' => $request->get('personnumber'),
                'posttype' => $request->get('posttype'),
                'location' => $request->get('location'),
                'carpic' => $name
            ]);

            $carDetail->save();

            return redirect(url('home'));
        }
    }


    public function storeAdmin(Request $request)
    {
        $carDetail = new CarDetail([
            'user_id' => $request->get('user_id'),
            'carname' => $request->get('carname'),
            'carprice' => $request->get('carprice'),
            'carmodel' => $request->get('carmodel'),
            'carseats' => $request->get('carseats'),
            'address' => $request->get('address'),
            'personnumber' => $request->get('personnumber'),
            'posttype' => $request->get('posttype'),
            'location' => $request->get('location'),
            'carpic' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($request->hasFile('carpic')) {
            $imageName = Str::random(10) . '.' . $request->file('carpic')->extension();
            $image = $request->file('carpic');
            $path = $image->storeAs('images', $imageName);
            $carDetail->carpic = $imageName;
        }

        $carDetail->save();

        return redirect()->route('allcars')->with('success', 'Car details updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarDetail  $carDetail
     * @return \Illuminate\Http\Response
     */
    public function show($carid)
    {
        $CarDetail = CarDetail::select('*')
            ->where('id', '=', $carid)
            ->get();
        return view('cardetail', compact('CarDetail'));
    }


    public function withdriver()
    {
        $CarDetail = CarDetail::select('*')
            ->where('posttype', '=', 'With Driver')
            ->get();
        return view('admin/cartype', compact('CarDetail'));
    }

    public function withoutdriver()
    {
        $CarDetail = CarDetail::select('*')
            ->where('posttype', '=', 'Without Driver')
            ->get();
        return view('admin/cartype', compact('CarDetail'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarDetail  $carDetail
     * @return \Illuminate\Http\Response
     */
    public function dashEdit($carid)
    {

        $CarDetail = CarDetail::select('*')
            ->where('id', '=', $carid)
            ->get();
        return view('admin/dashedit', compact('CarDetail'));
        // return view('editcar',compact('carDetail'));

    }


    public function update(Request $request, CarDetail $car_details)
    {
        $data = $request->validate([
            'carname' => 'required',
            'carprice' => 'required',
            'carmodel' => 'required',
            'carseats' => 'required',
            'address' => 'required',
            'personnumber' => 'required',
            'location' => 'required',
        ]);

    

        $car_details->update($data);
    
        // Assuming 'allcars' is the correct route name
        return redirect()->route('allcars')->with('success', 'Car details updated successfully');
    }
    

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarDetail  $carDetail
     * @return \Illuminate\Http\Response
     */
            public function destroy($id)
        {
            $carDetail = CarDetail::findOrFail($id);
            $carDetail->delete();

            return redirect()->route('allcars')->with('success', 'The car has been deleted successfully!');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userpost($id)
    {


        $CarDetail = CarDetail::select('*')
            ->where('user_id', '=', $id)
            ->get();
        return view('myposts', compact('CarDetail'));
    }

    public function allcars()
    {
        $CarDetail = CarDetail::all();
        return view('admin/cartype', compact('CarDetail'));
    }


    public function reservation()
    {
        return view('reservation');
    }
}
