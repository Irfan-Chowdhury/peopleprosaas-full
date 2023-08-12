<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'language_id',
        'title',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
    ];
}
