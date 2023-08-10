<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'language_id',
        'heading',
        'sub_heading'
    ];

    public function faqDetails()
    {
        return $this->hasMany(FaqDetail::class,'faq_id')
                ->orderBy('position','ASC');
    }
}
