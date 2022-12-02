<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Validasi extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_dana';
    protected $primaryKey = 'dana_id';

    protected $fillable = [
        'dana_id',
        'mustahik_id',
        'dana_yang_disetujui',
    ];
}