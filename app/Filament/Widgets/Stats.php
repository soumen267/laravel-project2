<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Filament\Widgets\Widget;

class Stats extends Widget
{
    protected static string $view = 'filament.widgets.stats';

    public $count, $product, $category;

    public function mount(){
        $this->count = User::all();
        $this->category = Category::all();
        $this->product = Product::all();
    }
    
}
