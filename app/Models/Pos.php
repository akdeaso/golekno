<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    use HasFactory;

    protected $table = "pos";
    protected $primaryKey = 'idpos';
    protected $fillable = [
        'tipepos',
        'foto',
        'gender',
        'umur',
        'tinggibadan',
        'deskripsi',
        'kontak',
        'nama',
        'tanggal',
        'tempat',
    ];
}
