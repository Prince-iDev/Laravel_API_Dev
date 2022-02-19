<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class localgovernmentarea extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'local_gov_area';
    protected $fillable = ['state_id', 'lga_name'];
}
