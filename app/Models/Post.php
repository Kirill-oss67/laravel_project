<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // use SoftDeletes;              // не понимаю почему теперь это не работает 

    
    protected $table = 'posts';  // указываем из какой таблизы в базе берем данные
    public $someProperty;
    protected $guarded = []; //  указываем массив защищенных методов(разрешение на добавление и изменение данных в базу) 
}
