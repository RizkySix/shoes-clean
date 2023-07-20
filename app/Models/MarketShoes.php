<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketShoes extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug_id';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function jenis_cleaning()
    {
        return $this->hasMany(JenisCleaning::class);
    }
}
?>