<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    use HasFactory;

    protected $table = 's_akses';

    protected $fillable = ['menu_id', 'submenu_id', 'jabatan_id'];
}
