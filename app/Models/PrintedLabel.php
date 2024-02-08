<?php

// app/Models/PrintedLabel.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintedLabel extends Model
{
    protected $table = 'ns_printed_labels';

    // Specify fillable fields if you plan to use mass assignment
    protected $fillable = ['product_id', 'start_position', 'end_position', 'printed_at'];

    // Define the inverse relationship with Product
    public function product()
    {
        return $this->belongsTo(NSProduct::class);
    }
}
