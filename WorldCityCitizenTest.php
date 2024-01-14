<?php
require("task.php");
use PHPUnit\Framework\TestCase;

class WorldCityCitizenTest extends TestCase
{
    public function testAddCity()
    {
        $world = new World(0);
        $city = new City("TestCity");
        $world->add_city($city);

        $this->assertCount(1, $world->cities);
    }

    public function testRandomCity()
    {
        $world = new World(3);

        $randomCity = $world->random_city();

        $this->assertInstanceOf(City::class, $randomCity);
    }

    public function testTotalCities()
    {
        $world = new World(5);

        $this->assertEquals(5, $world->total_cities());
    }

    public function testAddCitizen()
    {
        $city = new City();
        $city->add_citizen();

        $this->assertCount(1, $city->citizens);
    }

    public function testGenerateRandomCityName()
    {
        $city = new City();
        $randomCityName = $this->invokeMethod($city, 'generateRandomCityName');

        $this->assertIsString($randomCityName);
        $this->assertEquals(5, strlen($randomCityName));
    }

    private function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
