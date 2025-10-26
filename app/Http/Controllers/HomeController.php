<?php

namespace App\Http\Controllers;

use App\Models\Page;     // 👈 Tambahkan ini
use App\Models\Section;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // 1. Cari tahu ID dari halaman 'home'
            // Gagal jika halaman 'home' tidak ada di tabel pages
            $homePage = Page::where('slug', 'home')->firstOrFail();

            // 2. Ambil SEMUA section yang aktif untuk halaman tersebut
            // dan urutkan berdasarkan kolom order (jika ada)
            $sections = Section::where('page_id', $homePage->id)
                ->where('status', 'active')
                ->orderBy('order', 'asc') // Opsional, tapi sangat direkomendasikan
                ->get();

            $dbError = null;
        } 
        catch (QueryException $e) {
            Log::error('Database error in HomeController: ' . $e->getMessage());
            $sections = collect(); // Kirim koleksi kosong jika error
            $dbError = 'Koneksi ke database gagal.';
        } 
        catch (\Exception $e) {
            Log::error('Error umum di HomeController: ' . $e->getMessage());
            $sections = collect(); // Kirim koleksi kosong jika error
            $dbError = 'Terjadi kesalahan tak terduga.';
        }

        // 3. Kirim variabel $sections (bukan $about) ke view
        return view('pages.home', compact('sections', 'dbError'));
    }
}