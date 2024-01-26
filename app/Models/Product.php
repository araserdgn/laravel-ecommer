<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'category_id',
        'short_text',
        'price',
        'size',
        'color',
        'qty',
        'status',
        'content'
    ];
    //! fillable => çoklu verileri tek seferde göndermek için kullanılır

    public function category() {
        return $this->hasOne(Category::class,'id','category_id');
        // Category model içindeki İD 'yi , Product model içindeyz bu içerdeki fillable içindeki category_id bagladk
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
        //name alanını slug olarak kullanıyoruz
    }
}

// hasMany ==> çoklu kategori eklenir, kadın,erkek,cocuk vsvs vs
// hasOne ==> Product modelinde böyle kulandık cnk sadece 1 tane kategori alabilr
