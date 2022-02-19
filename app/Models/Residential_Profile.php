<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residential_Profile extends Model
{
    use HasFactory;
    protected $table = 'residential_profile';
    protected $fillabl = [
        'user_id',
        'home_address',
        'lga_house_address',
        'state_of_origin',
        'lga_state_of_origin'
    ];
}
