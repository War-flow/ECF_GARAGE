<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AvisFixture extends Fixture
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
        
        for ($pls = 1; $pls <= 10; $pls++) {
            $avis = new Avis();
            $avis->setName($this->faker->text(5));
            $avis->setMessage($this->faker->sentence(5));
            $avis->setNote($this->faker->numberBetween(1, 5));
            $avis->setValidation('validé');
            $manager->persist($avis);
        }
        $manager->flush();
    }
}
