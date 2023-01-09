<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;              

    
    protected $table = 'posts';  // указываем из какой таблизы в базе берем данные
    public $someProperty;
    protected $guarded = []; //  указываем массив защищенных методов(разрешение на добавление и изменение данных в базу) 

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id' );
    }
}
