<?php

namespace App\Repositories;

use App\Contracts\FaqDetailContract;
use App\Models\Landlord\FaqDetail;

class FaqDetailRepository extends BaseRepository implements FaqDetailContract
{
    protected $model;

    public function __construct(FaqDetail $model)
    {
        $this->$model = $model;
        parent::__construct($this->$model);
    }
}