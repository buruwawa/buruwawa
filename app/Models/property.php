<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;
     protected $fillable = [
         'site_id',
         'location_id',
        'metaname_id',
        'property_name',
         'property_type',
        'property_serial_no',
        'property_barcode',
        'property_tag_no',
        'property_description',
        'photo',
        'status',
        'user_id'
    ];
}
