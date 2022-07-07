<?php

namespace Lucas\App\Controllers;

abstract class Controller
{
    public function render(string $viewName, array $viewData = []): void
    {
        extract($viewData);
        $baseUrl = "http://localhost:8080";
        include "../src/Views/{$viewName}.php";
    }
}
