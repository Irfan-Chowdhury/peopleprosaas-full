<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'site_logo',
        'time_zone',
        'phone',
        'email',
        'free_trial_limit',
        'currency_code',
        'frontend_layout',
        'date_format',
        'footer',
        'footer_link',
        'developed_by'
    ];
}
