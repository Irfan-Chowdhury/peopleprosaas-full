<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'heading',
        'sub_heading',
        'image'
    ];
}
