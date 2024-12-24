<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
    public function compose(View $view)
    {
        // Fetch categories and their products
        $categories = Category::with(['products' => function ($query) {
            $query->latest()->take(7);
        }])->latest()->take(4)->get();

        // Share the categories data with all views
        $view->with('categories', $categories);
    }
}
