<?php

namespace App\DataFixtures;

use App\Entity\Services;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServicesFixtures extends Fixture
{

    private $counter = 1;



    public function load(ObjectManager $manager): void
    {
        $services = $this->createServices(title:'Démarrage et recharge de batterie',manager:$manager);
        $this->createServices(title:'Entretien Auto - Révision Vidange',manager:$manager);
        $this->createServices(title:'Courroie de Distribution',manager:$manager);
        $this->createServices(title:'Réparation plastique auto',manager:$manager);
        $this->createServices(title:'Rénovation Carrosserie',manager:$manager);
        $this->createServices(title:'Vitrage et Pare brise',manager:$manager);
        $this->createServices(title:'Diagnostic Electronique',manager:$manager);
        $manager->flush();
    }
    Public function createServices(string $title,ObjectManager $manager) 
    {
        $services = new Services();
        $services->setTitle($title);
        $manager->persist($services);

        return $services;

    }
}
