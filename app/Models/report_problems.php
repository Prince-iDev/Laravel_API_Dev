<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report_problems extends Model
{
    use HasFactory;
    protected $table = 'report_problems';
    protected $fillabl = [
        'user_id',
        'user_problems'
    ];
}
