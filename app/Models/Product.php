<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes,Cachable;
    protected $fillable = ['category_id','product_name','description','price','image','slug','color','size'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rating()
    {
        return $this->hasMany(App\Models\Rating::class, 'product_id', 'id');
    }
}
