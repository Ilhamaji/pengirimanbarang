<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    use HasFactory;

    protected $primaryKey = 'kodeBarang';

    protected $fillable = [
        'namaBarang',
        'jenisBarang',
        'jmlBarang',
        'beratBarang',
        'hargaBarang',
        'updated_at',
        'created_at'	
    ];
}
