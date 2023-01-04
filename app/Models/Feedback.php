<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = ['user'];

    public function scopeCari($query, array $cari)
    {
        $query->when($cari['search'] ?? false, function($query, $search){
            return $query->where('nama', 'like', '%'.$search.'%')
                        ->orwhere('jabatan', 'like', '%'.$search.'%')
                        ->orwhere('isi', 'like', '%'.$search.'%');
        });
    }
}
