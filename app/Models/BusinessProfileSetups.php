<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProfileSetups extends Model
{
    use HasFactory;
    protected $table = 'business_profile_setup';
    protected $fillable = [
        'user_id',
        'biz_type',
        'biz_name',
        'biz_related_to',
        'biz_description',
        'biz_email',
        'biz_phone_number',
        'biz_website_add',
        'biz_location_add',
        'biz_location_lga',
        'biz_reg_number',
        'biz_tax_id_number',
        'biz_CAC_name',
        'biz_CAC_size',
        'biz_logo_name',
        'biz_logo_size'
    ];
}
