<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['footer_title','footer_desc','footer_social_fb','footer_social_twt','footer_social_you','footer_social_link','footer_nav','footer_category','news_title','news_desc','footer_copy','footer_logo'];

    protected $casts = [
        'footer_category' => 'array',
    ];
}
