<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
        'site_logo',
        'is_rtl',
        'date_format',
        'currency',
        'currency_position',
        'frontend_layout',
        'developed_by',
        'phone',
        'email',
        'free_trial_limit',
        'chat_script',
        'ga_script',
        'fb_pixel_script',
        'active_payment_gateway',
        'stripe_public_key',
        'paystack_public_key',
        'stripe_secret_key',
        'paystack_secret_key',
        'paypal_client_id',
        'paypal_client_secret',
        'razorpay_number',
        'razorpay_key',
        'razorpay_secret',
    ];
}
