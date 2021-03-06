<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    
    protected $fillable = [
    'title',
    'body',
];

public function posts()   
{
    return $this->hasMany('App\Post');  
}
public function getPaginateByLimit(int $limit_count = 5)
{
     return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
}
?>