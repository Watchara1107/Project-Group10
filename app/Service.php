<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Service extends Model
{
    protected $primaryKey = 'id';
    public function category(){
        return $this->belongsTo(Category::class,'id');
    }
}
