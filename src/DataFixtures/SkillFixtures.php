<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public const SKILLS = [
        [
            "name" => "PHP",
            "level" => "70",
            "image" => "https://picsum.photos/200/300"
        ],

        [
            "name" => "HTML",
            "level" => "90",
            "image" => "https://picsum.photos/200/300"
        ],

        [
            "name" => "CSS",
            "level" => "65",
            "image" => "https://picsum.photos/200/300"
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::SKILLS as $data)
         {
            $skill = new Skill();
            $skill->setName($data['name']);
            $skill->setLevel($data['level']);
            $skill->setImage($data['image']);
            $manager->persist($skill);

            $this->addReference('Skill_' . $data['name'], $skill);

         }
        
        $manager->flush();
    }
}
