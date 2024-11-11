<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Package extends Model
{
    use HasFactory;
    protected $table ="packages";
    protected $fillable =
    [
        "product_name",
        "images",
        "description",
        "sale_price",
        "ragular_price",
        "category"
    ];
}
