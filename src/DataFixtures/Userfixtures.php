<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Users;
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
        //Generation du compte administateur
        $admin = new Users();

        //Generation de l'email
        $admin->setEmail('quai_hote@demo.fr');

        //Generation du mot de passe
        $admin->setPassword($this->passwordEncoder->hashPassword($admin,'lopo97300'));

        //Attribution de Role
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);


        $manager->flush();
    }
}
