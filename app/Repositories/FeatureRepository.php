<?php

namespace App\Repositories;

use App\Contracts\FeatureContract;
use App\Models\Landlord\Feature;

class FeatureRepository extends BaseRepository implements FeatureContract
{
    protected $model;

    public function __construct(Feature $model)
    {
        $this->$model = $model;
        parent::__construct($this->$model);
    }

    /**
     * FeatureController.
     */
}
