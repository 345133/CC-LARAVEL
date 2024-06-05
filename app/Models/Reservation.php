<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'car_detail_id', 'start_date', 'end_date','message','car_detail_image','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carDetail()
    {
        return $this->belongsTo(CarDetail::class);
    }


    
}