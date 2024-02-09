<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public const USERS = [
        [
            'username' => 'maxdlr',
            'email' => 'max@qimono.tv'
        ],
        [
            'username' => 'augusta',
            'email' => 'augusta@qimono.tv'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::USERS as $user) {
            $u = new User();
            $u
                ->setUsername($user['username'])
                ->setEmail($user['email'])
                ->setPassword($this->userPasswordHasher->hashPassword(
                    $u,
                    'password'
                ));


            $manager->persist($u);
        }

        $manager->flush();
    }
}
