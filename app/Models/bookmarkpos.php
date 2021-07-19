<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookmarkpos extends Model
{
    use HasFactory;
    protected $table = "bookmarkpos";
    protected $primaryKey = 'idbookmark';
    protected $fillable = [
        'idpos',
        'idakun',
    ];
    public $timestamps = false;
    public $guarded = [];

    public function bookmarkuser()
    {
        return $this->belongsTo('App\Models\Pos',);
    }
}
