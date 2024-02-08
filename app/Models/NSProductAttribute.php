<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NSProductAttribute extends Model
{
    protected $table = 'ns_product_attributes';

    // Specify fillable fields if you plan to use mass assignment
    protected $fillable = ['product_id', 'color', 'size'];

    // Define the inverse relationship with Product
    public function product()
    {
        return $this->belongsTo(NSProduct::class);
    }
}
