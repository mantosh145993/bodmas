<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaidPackage extends Model
{
    protected $table ="paid_packages";
    protected $fillable = [
        'package_name',
        'description',
        'base_price',
        'gst_rate',
        'gst_amount',
        'total_price',
        'image'
    ];
}
