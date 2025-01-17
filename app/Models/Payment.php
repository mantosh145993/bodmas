<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id',
        'order_id',
        'product_name',
        'payment_type',
        'package_type',
        'quantity',
        'price',
        'amount',
        'gst',
        'gst_amount',
        'currency',
        'vendor_gst',
        'customer_name',
        'number',
        'customer_email',
        'payment_status',
        'txn_date',
        'payment_method'
    ];
}
