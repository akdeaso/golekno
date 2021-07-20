<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flagpos extends Model
{
    use HasFactory;
    protected $table = "flagpos";
    protected $primaryKey = 'idflag';
    protected $fillable = [
        'idpos',
        'idakun',
        'alasan',
    ];

    public function pos() {
        return $this->belongsTo('App\Models\Pos');
  }
  public function pelapor() {
    return $this->hasMany('App\Models\User',);
}

}
