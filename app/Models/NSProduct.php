<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NSProduct extends Model
{
    protected $table = 'ns_products';

    // Specify fillable fields if you plan to use mass assignment
    protected $fillable = ['code'];

    // Define the relationship with ProductAttribute
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    // Define the relationship with PrintedLabel
    public function printedLabels()
    {
        return $this->hasMany(PrintedLabel::class);
    }
}
