<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AvisFixture extends Fixture
{

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
        
        // Genération de 10 faux avis avec Faker
        for ($pls = 1; $pls <= 10; $pls++) {

            $avis = new Avis();
            
            // Genération d'un faux nom taille max 5 lettre
            $avis->setName($this->faker->text(5));
            
            // Genération d'un faux message taille max 5 mots
            $avis->setMessage($this->faker->sentence(5));

             // Genération d'une fausse note compris entre 1 et 5
            $avis->setNote($this->faker->numberBetween(1, 5));

            // Genération d'une fausse valitation
            $avis->setValidation('validé');

            $manager->persist($avis);
        }
        $manager->flush();
    }
}
