<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;
    protected $fillable = [ // $fillable => model içinde yazan kısımlara izin ver demek.
                            // toplu veri eklemek için kullanılır
        'image',
        'thumbnail',
        'name',
        'slug',
        'content',
        'cat_ust',
        'status',
    ];

    public function items() {
        return $this->hasMany(Product::class, 'category_id','id');
        // ($related, $foreignKey = null, $localKey = null) bu HASMANY yapısı
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}

// hasMany ==> çoklu kategori eklenir, kadın,erkek,cocuk vsvs vs
// hasOne ==> Product modelinde böyle kulandık cnk sadece 1 tane kategori alabilr
