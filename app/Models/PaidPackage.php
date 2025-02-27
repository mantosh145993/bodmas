<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaidPackage extends Model
{
    protected $table ="paid_packages";
    protected $fillable = [
        'package_name',
        'url',
        'description',
        'base_price',
        
        'basic_fee',
        'premium_fee',
        'nri_fee',
        'first_installment',
        'second_installment',
        'first_installment_premium',
        'second_installment_premium',

        'gst_rate',
        'gst_amount',
        'total_price',
        'image'
    ];
}
