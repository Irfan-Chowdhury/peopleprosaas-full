<?php

namespace App\Contracts;

interface LanguageContract extends BaseContract {

    /**
     * LanguageController.
     */
    public function setDefaultZeroToAll();
    public function defaultLanguagesCount();
}
