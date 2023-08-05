<?php

namespace App\Repositories;

use App\Contracts\LanguageContract;
use App\Models\Landlord\Language;

class LanguageRepository extends BaseRepository implements LanguageContract
{
    protected $model;

    public function __construct(Language $model)
    {
        $this->$model = $model;
        parent::__construct($this->$model);
    }

    /**
     * LanguageController.
     */
    public function setDefaultZeroToAll()
    {
        return $this->model->where('is_default', 1)->update(['is_default' => 0]);
    }

    public function defaultLanguagesCount()
    {
        return $this->model->where('is_default', 1)->count();
    }
}
