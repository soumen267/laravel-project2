<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = ['image','title','subtitle'];

    protected $casts = ['image' => 'array'];
}
