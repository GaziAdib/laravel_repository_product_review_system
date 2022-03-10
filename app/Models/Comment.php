<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'comment', 'rating'
    ];

    // Belongs to  connection

    public function product() {
       return $this->belongsTo(Product::class);
    }
}
