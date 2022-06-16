<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // DETERMINES WICH FIELDS CAN BE FILLED FROM A FORM
    protected $fillable = ['title', 
                            'slug', 
                            'content', 
                            'category_id', 
                            'description', 
                            'posted',
                            'image'];

    // RELATIONSHIP ONE TO ONE WITH CATEGORIES
    // IT IS JUST category() BECAUSE POST BELONGS JUST TO ONE CATEGORY
    public function category(){
        return $this->belongsTo(Category::class);
    }

}


