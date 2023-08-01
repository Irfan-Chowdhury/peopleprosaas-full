<?php
namespace App\Repositories;

use App\Contracts\LanguageContract;
use App\Models\Landlord\Language;
use App\Repositories\BaseRepository;
class LanguageRepository extends BaseRepository implements LanguageContract {

    public function __construct(Language $model){
        parent::__construct($model);
    }
}
