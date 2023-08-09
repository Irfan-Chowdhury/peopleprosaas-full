<?php

namespace App\Models\Landlord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'language_id',
        'heading',
        'sub_heading',
        'image'
    ];

    public function moduleDetails()
    {
        return $this->hasMany(ModuleDetail::class,'module_id')
                ->orderBy('position','ASC');
    }
}
