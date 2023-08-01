<?php

namespace App\Services;

use App\Contracts\LanguageContract;

class LanguageService {

    private $languageContract;
    public function __construct(LanguageContract $languageContract)
    {
        $this->languageContract = $languageContract;
    }

    public function getAll()
    {
        return $this->languageContract->all();
    }

}
