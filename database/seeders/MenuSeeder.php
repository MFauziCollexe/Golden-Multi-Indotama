<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Submenu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'title' => 'Perusahaan Kami',
                'route' => 'company',
                'submenu' => [
                    ['label' => 'Profil Perusahaan', 'hash' => '#profil-perusahaan'],
                    ['label' => 'Brand', 'hash' => '#brand'],
                    ['label' => 'Fasilitas & Kapasitas', 'hash' => '#fasilitas'],
                    ['label' => 'Nilai Perusahaan', 'hash' => '#nilai'],
                ],
            ],
            [
                'title' => 'Layanan',
                'route' => 'services',
                'submenu' => [
                    ['label' => 'Penyimpanan Multi-Suhu', 'hash' => '#penyimpanan-multi-suhu'],
                    ['label' => 'Distribusi Cepat & Aman', 'hash' => '#distribusi-cepat-aman'],
                    ['label' => 'Manajemen Rantai Dingin', 'hash' => '#manajemen-rantai-dingin'],
                    ['label' => 'Penanganan Produk Sensitif', 'hash' => '#penanganan-produk-sensitif'],
                    ['label' => 'Smart Cold Monitoring', 'hash' => '#smart-cold-monitoring'],
                    ['label' => 'Sewa Ruang Pendingin', 'hash' => '#sewa-ruang-pendingin'],
                ],
            ],
            [
                'title' => 'Inovasi',
                'route' => 'innovation',
                'submenu' => [
                    ['label' => 'Teknologi & Otomatisasi Gudang', 'hash' => '#teknologi-otomatisasi'],
                    ['label' => 'Solusi Penyimpanan Cerdas', 'hash' => '#solusi-cerdas'],
                    ['label' => 'Energi Efisien & Ramah Lingkungan', 'hash' => '#energi-efisien'],
                    ['label' => 'Integrasi Digital & Data Analytics', 'hash' => '#integrasi-digital'],
                    ['label' => 'Penelitian dan Pengembangan (R&D)', 'hash' => '#penelitian-rnd'],
                ],
            ],
            [
                'title' => 'Karir',
                'route' => 'careers',
                'submenu' => [
                    ['label' => 'Bergabung Bersama Kami', 'hash' => '#bergabung_bersama_kami'],
                    ['label' => 'Mengapa Kami', 'hash' => '#mengapa_kami'],
                ],
            ],
            [
                'title' => 'Hubungi Kami',
                'route' => 'contact',
                'submenu' => [],
            ],
        ];

        foreach ($menus as $menuData) {
            $menu = Menu::create([
                'title' => $menuData['title'],
                'route' => $menuData['route'],
            ]);

            foreach ($menuData['submenu'] as $sub) {
                Submenu::create([
                    'menu_id' => $menu->id,
                    'label' => $sub['label'],
                    'hash' => $sub['hash'],
                ]);
            }
        }
    }
}

