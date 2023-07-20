<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_pesanan';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function market()
    {
        return $this->belongsTo(MarketShoes::class , 'market_shoe_id');
    }

    public function detail_pesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }

}
?>