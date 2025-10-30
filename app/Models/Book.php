<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'author', 'description', 'cover', 'published_year','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function pages(){
        return $this->hasMany(Page::class)->orderBy('page_number');
    }
}
