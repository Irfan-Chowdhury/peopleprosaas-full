<?php

namespace App\Repositories;

use App\Contracts\SocialContract;
use App\Models\Landlord\Social;

class SocialRepository extends BaseRepository implements SocialContract
{
    protected $model;

    public function __construct(Social $model)
    {
        $this->$model = $model;
        parent::__construct($this->$model);
    }

    /**
     * SocialController.
     */
}
