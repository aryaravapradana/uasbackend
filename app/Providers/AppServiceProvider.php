<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }


    public function boot(): void
    {
            View::composer('*', function ($view) {
                $view->with('allCategories', Category::with('subcategories')->get());
                $view->with('categoryIcons', [
                    'Elektronik' => 'fa-tv',
                    'Kecantikan' => 'fa-spray-can-sparkles',
                    'Fashion' => 'fa-shirt',
                    'Rumah Tangga' => 'fa-house-chimney',
                    'Olahraga' => 'fa-dumbbell',
                    'Hobi' => 'fa-gamepad',
            ]);
        });
    }
}
