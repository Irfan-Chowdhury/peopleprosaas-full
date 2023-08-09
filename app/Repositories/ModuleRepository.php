<?php

namespace App\Repositories;

use App\Contracts\ModuleContract;
use App\Models\Landlord\Module;

class ModuleRepository extends BaseRepository implements ModuleContract
{
    protected $model;

    public function __construct(Module $model)
    {
        $this->$model = $model;
        parent::__construct($this->$model);
    }
}