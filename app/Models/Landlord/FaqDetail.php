<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'faq_id',
        'question',
        'answer',
        'position'
    ];
}
