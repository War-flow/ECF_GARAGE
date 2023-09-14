<?php

namespace App\DataFixtures;

use App\Entity\Voitures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class VoitureFixtures extends Fixture
{

    private $counters = 1;

    /**
     * var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $max = 'now';
        for ($pls = 1; $pls <= 10; $pls++) {
            $Voitures = new Voitures();
            $Voitures->setName($this->faker->text(5));
            $Voitures->setPrice($this->faker->numberBetween(2000, 25000));
            $Voitures->setYear($this->faker->numberBetween($min = 2000, $max = 2023));
            $Voitures->setMiles($this->faker->numberBetween(10000,250000));
            $Voitures->setFuel($this->faker->randomElement($array = ['Essence', 'Diesel']));
            $Voitures->setOp1($this->faker->text(20));
            $Voitures->setOp2($this->faker->text(20));
            $Voitures->setOp3($this->faker->text(20));
            $Voitures->setFeat1($this->faker->text(20));
            $Voitures->setFeat2($this->faker->text(20));
            $Voitures->setFeat3($this->faker->text(20));
            $manager->persist($Voitures);
        }
        $manager->flush();
    }
}