<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\MenuComposer;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Kirim variabel $menus ke semua view
        View::composer('*', MenuComposer::class);
    }
}
