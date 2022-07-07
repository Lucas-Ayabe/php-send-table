<?php

namespace Lucas\App;

use Lucas\App\Controllers\PersonController;

class DependencyContainer
{
    public readonly PersonController $personController;

    public function __construct()
    {
        $this->personController = new PersonController();
    }
}
