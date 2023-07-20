<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCleaning extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function market()
    {
        return $this->belongsTo(MarketShoes::class);
    }
}
?>