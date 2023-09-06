<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class Userfixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ) {
    }
    public function load(ObjectManager $manager): void
    {
        // On crée le compte administateur
        $admin = new Admin();
        $admin->setEmail('quai_hote@demo.fr');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'Blue-flower28++'));

        $manager->persist($admin);


        $manager->flush();
    }
}
