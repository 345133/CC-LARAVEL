<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'number', // Add 'number' attribute if used in the create() method
        'city', // Add 'city' attribute if used in the create() method
    ];

    public function CarDetail(){
        return $this->hasMany(CarDetail::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isAdmin()
    {
        // Implement your logic to check if the user is an admin
        // For example, you might check if the user has a certain role or permission
        return $this->role === 'admin'; // Assuming 'admin' is a role assigned to admins
    }
}
