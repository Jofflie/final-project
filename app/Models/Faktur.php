<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'kuantitas',
        'alamat_pengiriman',
        'kode_pos'
    ];

}
