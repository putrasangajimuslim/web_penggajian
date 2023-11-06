<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PotonganAlfa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'potongan_alfa';

    protected $fillable = [
        'id_jabatan',
        'jml',
    ];
}
