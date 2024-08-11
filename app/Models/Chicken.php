<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chicken extends Model
{
    use SoftDeletes;

    // Specify the table name if it's not following the convention
    protected $table = 'flock';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'birthday',
        'breed',
        'bio',
        'slug',
        'image',
        'deleted'
    ];

    // Optionally, specify the attributes that should be cast to native types
    protected $casts = [
        'birthday' => 'date',
    ];

    // Optionally, specify the attributes that should be mutated to dates
    protected $dates = [
        'created_at',
        'updated_at',
        'birthday',
    ];
}
