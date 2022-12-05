<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Survey extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_survey';
    protected $primaryKey = 'survey_id';

    protected $fillable = [
        'user_id',
        'mustahik_id',
        'photo',
        'keterangan',
        'petugas_survey',
    ];
}
