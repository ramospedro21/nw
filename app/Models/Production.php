<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Production extends Model
{
    use HasFactory;
    use Softdeletes;

    const PER_PAGE = 16;

    const TYPES = [
        0 => 'MOVIE',
        1 => 'SERIE'
    ];

    protected $fillable = [
        'name',
        'type',
        'release_date',
        'votes'
    ];
}
