<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'job_email', 
        'job_company',
        'job_position',
        'job_description',
        'job_location',
        'state',
        'job_category',
        'job_duration',
        'job_type'
    ];
}
