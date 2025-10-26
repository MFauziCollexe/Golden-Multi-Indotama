<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;
use Illuminate\Support\Facades\Log;
use Throwable;

class MenuComposer
{
    public function compose(View $view)
    {
        $dbError = false;
        $menus = collect();

        try {
            $menus = Menu::with('submenus')->orderBy('id')->get();
        } catch (Throwable $e) {
            Log::error('DB error in MenuComposer: ' . $e->getMessage());
            $dbError = true;
            $menus = collect(); // fallback agar tidak error di view
        }

        $view->with([
            'menus' => $menus,
            'footerMenus' => $menus,
            'dbError' => $dbError,
        ]);
    }
}
