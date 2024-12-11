<?php

namespace App\DataFixtures;

use App\Entity\Session;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $session = new Session();
        $session->setCode("12345")
            ->setDate(new \DateTime())
            ->setActive(true);
            $manager->persist($session);

        $user = new User();
        $user->setName("test")
            ->setEmail("test@gmail.com")
            ->setSession($session);
        $manager->persist($user);

        $manager->flush();
    }
}
