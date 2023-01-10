<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes, Cachable;
    protected $table = 'category';
    protected $fillable = ['cat_name','slug'];
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
