<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = ['user'];

    public function masjids()
    {
        return $this->belongsTo(Masjid::class, 'masjid_id', 'id')->orderBy('nama');
    }

    public function bahans()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id', 'id');
    }
}
