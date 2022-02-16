<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $table = 's_submenu';

    protected $fillable = ['menu_id','nama', 'icon', 'url', 'ordering'];

    function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
