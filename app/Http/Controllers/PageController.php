<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function show($slug)
    {
        try {
            // 1️⃣ Ambil page berdasarkan slug
            $page = Page::safeFindBySlug($slug);

            // Jika null berarti page tidak ditemukan
            if (!$page) {
                throw new ModelNotFoundException("Page '{$slug}' tidak ditemukan.");
            }

            // 2️⃣ Ambil semua sections aktif berdasarkan page_id
            $sections = Section::safeFindByPage($page->id);

            // 3️⃣ Tentukan path view
            $viewPath = 'pages.' . $slug;

            // 4️⃣ Cek apakah view tersedia
            if (!view()->exists($viewPath)) {
                return response()->view('errors.missing-view', [
                    'slug' => $slug,
                    'page' => $page,
                    'sections' => $sections,
                ], 404);
            }

            // 5️⃣ Tampilkan halaman dengan data page + sections
            return view($viewPath, compact('page', 'sections'));
        } 
        catch (ModelNotFoundException $e) {
            // Jika page tidak ditemukan
            return response()->view('errors.404', [
                'message' => $e->getMessage(),
            ], 404);
        } 
        catch (\Exception $e) {
            // Jika error lain (query, view, dsb)
            Log::error("Error saat memuat halaman '{$slug}': " . $e->getMessage());

            return response()->view('errors.general', [
                'message' => 'Terjadi kesalahan saat memuat halaman.'
            ], 500);
        }
    }
}
