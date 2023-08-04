<?php

namespace App\Contracts;

interface LanguageContract extends BaseContract {

    public function setDefaultZeroToAll();
    public function defaultLanguagesCount();
}
