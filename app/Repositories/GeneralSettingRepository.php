<?php

namespace App\Repositories;

use App\Contracts\GeneralSettingContract;
use App\Models\Landlord\GeneralSetting;

class GeneralSettingRepository extends BaseRepository implements GeneralSettingContract
{
    protected $model;

    public function __construct(GeneralSetting $model)
    {
        $this->$model = $model;
        parent::__construct($this->$model);
    }
}
