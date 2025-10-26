<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'section_name',
        'title',
        'subtitle',
        'description',
        'lottie_path',
        'image_path',
        'order',
        'status',
    ];

    /**
     * Relasi ke model Page
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Scope untuk ambil section aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Method aman untuk ambil semua section milik page tertentu.
     * Menggunakan try...catch agar jika error, tidak membuat sistem crash.
     */
    public static function safeFindByPage($pageId)
    {
        try {
            return self::where('page_id', $pageId)
                ->where('status', 'active')
                ->orderBy('order')
                ->get();
        } catch (\Exception $e) {
            Log::error("Gagal memuat sections untuk page_id {$pageId}: " . $e->getMessage());
            return collect(); // kembalikan koleksi kosong biar tidak error di view
        }
    }
}
