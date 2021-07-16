<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporhilang extends Model
{
    use HasFactory;
    protected $table = "laporhilang";
    protected $primaryKey = 'idlapor';
    protected $fillable = [
        'idpos',
        'idakun',
        'kontak',
        'tempatpenemuan',
        'deskripsipenemuan',
        'created_at',
        'updated_at',
    ];

    public function pos() {
        return $this->belongsTo('App\Models\Pos');
  }
  public function pelapor() {
    return $this->hasMany('App\Models\User',);
}

}
