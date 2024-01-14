<?php

class Citizen {
    public $age;

    public function __construct() {
        $this->age = rand(0, 100);
    }
}

class City {
    public $name;
    public $citizens;

    public function __construct($name = "") {
        $this->name = $name ?: $this->generateRandomCityName();
        $this->citizens = [];
    }

    public function add_citizen() {
        $citizen = new Citizen();
        $this->citizens[] = $citizen;
    }

    private function generateRandomCityName() {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomCityName = '';
        for ($i = 0; $i < 5; $i++) {
            $randomCityName .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomCityName;
    }
}

class World {
    public $cities;

    public function __construct($num) {
        $this->cities = [];
        for ($i = 0; $i < $num; $i++) {
            $city = new City();
            for ($j = 0; $j < 50; $j++) {
                $city->add_citizen();
            }
            $this->add_city($city);
        }
    }

    public function add_city(City $city) {
        $this->cities[] = $city;
    }

    public function random_city() {
        return $this->cities[rand(0, count($this->cities) - 1)];
    }

    public function total_cities() {
        return count($this->cities);
    }
}

// Example usage:
$world = new World(100);
echo "Total Cities in the World: " . $world->total_cities() . PHP_EOL;

$randomCity = $world->random_city();
echo "<br>Random City Name: ". $randomCity->name . PHP_EOL;
echo "<br>Number of Citizens in the Random City: " . count($randomCity->citizens) . PHP_EOL;
