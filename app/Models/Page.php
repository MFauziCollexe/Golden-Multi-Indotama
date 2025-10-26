<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'meta_title',
        'meta_description',
        'status',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    /**
     * Scope untuk mengambil page aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Method aman untuk ambil page berdasarkan slug
     * dengan try...catch di dalam model.
     */
    public static function safeFindBySlug($slug)
    {
        try {
            return self::where('slug', $slug)
                ->with(['sections' => function ($query) {
                    $query->where('status', 'active')->orderBy('order');
                }])
                ->firstOrFail();
        } catch (\Exception $e) {
            Log::error('Gagal memuat page: ' . $e->getMessage());
            return null;
        }
    }
}
