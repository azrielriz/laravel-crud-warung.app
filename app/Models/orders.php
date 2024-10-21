<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stocks',
        'nama_pembeli',
        'total_harga',
    ];

    protected $cast =[
        'stocks' => 'array',
    ];
}
