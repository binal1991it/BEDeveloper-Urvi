<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lists extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'birth_date',
        'age',
        'points',
        'order',
        'address',
        'created_at',
        'updated_at'
    ];

    protected $searchableFields = ['*'];

    protected $table = 'lists';
}
