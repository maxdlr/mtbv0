<?php

namespace App\DataFixtures;

use App\Entity\SocialLink;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SocialLinkFixtures extends Fixture
{
    public const INSTAGRAM = [
        'name' => 'instagram',
        'link' => 'https://www.instagram.com/motion.tober/',
    ];

    public const YOUTUBE = [
        'name' => 'youtube',
        'link' => 'https://www.youtube.com/@motiontober',
    ];

    public const LINKEDIN = [
        'name' => 'linkedin',
        'link' => 'https://www.linkedin.com/company/motiontober/',
    ];

    public const TWITTER = [
        'name' => 'twitter',
        'link' => 'https://twitter.com/motiontober',
    ];

    public const TWITCH = [
        'name' => 'twitch',
        'link' => 'https://www.twitch.tv/motiontober'
    ];

    public const DISCORD = [
        'name' => 'discord',
        'link' => 'https://discord.com/invite/ZFwQNWTKrp'
    ];

    public function load(ObjectManager $manager)
    {
        $allSocialLinks = [
            self::INSTAGRAM,
            self::YOUTUBE,
            self::LINKEDIN,
            self::TWITTER,
            self::TWITCH,
            self::DISCORD
        ];

        foreach ($allSocialLinks as $socialLink) {
            $link = new SocialLink();

            $link->setName($socialLink['name']);
            $link->setLink($socialLink['link']);

            $manager->persist($link);

        }
        $manager->flush();
    }

}