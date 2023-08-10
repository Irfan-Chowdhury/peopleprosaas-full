<?php

namespace App\Repositories;

use App\Contracts\ModuleDetailContract;
use App\Models\Landlord\ModuleDetail;

class ModuleDetailRepository extends BaseRepository implements ModuleDetailContract
{
    protected $model;

    public function __construct(ModuleDetail $model)
    {
        parent::__construct($model);
    }
}
