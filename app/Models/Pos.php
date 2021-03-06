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
        'idakun',
        'flagcounter',
        'statuspos',
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

    public function laporhilang()
    {
        return $this->hasOne('App\Models\Pos');
    }
    public function bookmarkuser()
    {
        $cid = auth()->user()!=null ? auth()->user()->idakun : null;
        return $this->belongsTo(bookmarkpos::class,'idbookmark','idpos')->where('idakun',$cid);
    }
    public function bookmark()
    {
        return $this->bookmarkuser()->selectRaw('idpos,count(*) as count')->groupBy('idpos');
    }
}
