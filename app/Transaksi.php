<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barang_id', 'jumlah', 'total',
    ];

    public function barang(){
        return $this->belongsTo('App\Barang','barang_id','id');
    }
}
