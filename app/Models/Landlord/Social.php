<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'link',
        'icon',
        'position'
    ];
}
