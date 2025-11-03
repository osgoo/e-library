<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = ['book_id','page_number','page_content'];

    protected $appends = ['page_content_url'];

    public function getPageContentUrlAttribute()
    {
        $placeholder = 'https://via.placeholder.com/150x210/CCCCCC/969696?text=Page';

        if ($this->page_content) {
            return Storage::url($this->page_content);
        }

        return $placeholder;
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
