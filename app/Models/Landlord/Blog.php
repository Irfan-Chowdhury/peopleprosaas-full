<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
    ];
}
