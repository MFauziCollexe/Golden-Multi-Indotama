<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submenu extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id', 'label', 'hash'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
