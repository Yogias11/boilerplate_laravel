<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDivisi extends Model
{
    use HasFactory;

    protected $table = 'user_divisi';

    protected $fillable = ['user_id', 'divisi_id'];
}
