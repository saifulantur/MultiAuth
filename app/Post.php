<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['image','bookName','description','price','author_id'];

    function relationToAuthorName(){
        return $this->hasOne('App\AuthorName', 'id', 'author_id');
    }
}
