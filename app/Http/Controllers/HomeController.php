<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Mews\Purifier\Facades\Purifier; // ✅ untuk sanitasi HTML

class HomeController extends Controller
{
    public function index()
    {
        try {
            // 1. Ambil halaman dengan slug 'home'
            $homePage = Page::where('slug', 'home')->firstOrFail();

            // 2. Ambil semua section aktif dari halaman tsb
            $sections = Section::where('page_id', $homePage->id)
                ->where('status', 'active')
                ->orderBy('order', 'asc')
                ->get();

            // 3. Bersihkan HTML di setiap description agar aman
            $sections->transform(function ($section) {
                $section->description = Purifier::clean($section->description);
                return $section;
            });

            $dbError = null;
        } 
        catch (QueryException $e) {
            Log::error('Database error in HomeController: ' . $e->getMessage());
            $sections = collect();
            $dbError = 'Koneksi ke database gagal.';
        } 
        catch (\Exception $e) {
            Log::error('Error umum di HomeController: ' . $e->getMessage());
            $sections = collect();
            $dbError = 'Terjadi kesalahan tak terduga.';
        }

        // 4. Kirim variabel ke view
        return view('pages.home', compact('sections', 'dbError'));
    }
}
