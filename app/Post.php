<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
class Post extends Model
{use SoftDeletes;
    
    protected $fillable = [
    'title',
    'body',
    'category_id',
    'user_id'
];
public function getPaginateByLimit(int $limit_count = 10)
{
return $this::with(['category','user'])->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
public function category()
{
    return $this->belongsTo('App\Category');
}
public function user()
{
    return $this->belongsTo('App\User');
}

}
?>