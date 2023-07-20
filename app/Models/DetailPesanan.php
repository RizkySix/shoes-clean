<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function cleanings()
    {
        return $this->belongsToMany(JenisCleaning::class , 'detail_pesanan_jenis_cleaning' , 'detail_pesanan_id' , 'jenis_cleaning_id')
                    ->withTimestamps();
    }
}

?>