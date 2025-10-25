<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;

class MenuComposer
{
    public function compose(View $view)
    {
        // Ambil menu utama (header)
        $menus = Menu::with('submenus')->orderBy('id')->get();

        // Untuk sementara, gunakan menu yang sama untuk footer
        // nanti bisa diganti logikanya kalau ingin beda
        $footerMenus = $menus;

        // Kirim ke semua view
        $view->with([
            'menus' => $menus,
            'footerMenus' => $footerMenus,
        ]);
    }
}
