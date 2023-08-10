<?php

namespace App\Repositories;

use App\Contracts\FaqContract;
use App\Models\Landlord\Faq;

class FaqRepository extends BaseRepository implements FaqContract
{
    protected $model;

    public function __construct(Faq $model)
    {
        $this->$model = $model;
        parent::__construct($this->$model);
    }
}