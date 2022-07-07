<?php

namespace Lucas\App\Controllers;

use Lucas\App\Models\Person;
use PDO;

class PersonController extends Controller
{
    private Person $person;

    public function __construct()
    {
        $this->person = new Person(new PDO("sqlite:../store/people.db"));
    }

    public function list(): void
    {
        $this->render("Pages/list-people", ['people' => $this->person->findAll()]);
    }

    public function registerForm(): void
    {
        $this->render("Pages/register-people");
    }

    public function register(): void
    {
        $names = filter_input(INPUT_POST, 'name', FILTER_DEFAULT, FILTER_FORCE_ARRAY);
        $ages = filter_input(INPUT_POST, 'age', FILTER_DEFAULT, FILTER_FORCE_ARRAY);

        /**
         * Converte os dados que foram recebidos de volta a forma
         * em que eles estavam no JS.
         */
        $people = array_map(
            fn ($name, $age) => [
                'name' => $name,
                'age' => $age
            ],
            $names,
            $ages
        );

        foreach ($people as $personRecord) {
            $this->person->create($personRecord['name'], $personRecord['age']);
        }
    }
}
