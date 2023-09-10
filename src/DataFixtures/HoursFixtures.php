<?php

namespace App\DataFixtures;

use App\Entity\Horaires;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // On crée les Horaires par défaut
        $hours = $this->createHours(days: 'Lundi', AMHO:12, AMHC:14, PMHO:19, PMHC:22, manager :$manager);
        $this->createHours(days: 'Mardi', AMHO:12, AMHC:14, PMHO:19, PMHC:22, manager :$manager);
        $this->createHours(days: 'Mercredi', AMHO:0, AMHC:0, PMHO:0, PMHC:0, manager :$manager);
        $this->createHours(days: 'Jeudi', AMHO:12, AMHC:14, PMHO:19, PMHC:22, manager :$manager);
        $this->createHours(days: 'Vendredi', AMHO:12, AMHC:14, PMHO:19, PMHC:22, manager :$manager);
        $this->createHours(days: 'Samedi', AMHO:0, AMHC:0, PMHO:19, PMHC:23, manager :$manager);
        $this->createHours(days: 'Dimanche', AMHO:12, AMHC:14, PMHO:0, PMHC:0, manager :$manager);
       $manager->flush();

    }
    Public function createHours(string $days, int $AMHO , int $AMHC , int $PMHO , int $PMHC , ObjectManager $manager) 
    {
        $hours = new Horaires();
        $hours->setdays($days);
        $hours->setAMHO($AMHO);
        $hours->setAMHC($AMHC);
        $hours->setPMHO($PMHO);
        $hours->setPMHC($PMHC);
        $manager->persist($hours);
 
        return $hours;
 
    }
}
