<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tim extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = ['id'];
    protected $hidden = ['user'];

    public function scopeCari($query, array $cari)
    {
        $query->when($cari['search'] ?? false, function($query, $search){
            return $query->where('nama', 'like', '%'.$search.'%')
                        ->orWhere('posisi', 'like', '%'.$search.'%');
        });
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
