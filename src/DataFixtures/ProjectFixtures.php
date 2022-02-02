<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJECTS = [
        [
            "name" => "Incit easy",
            "link" => "https://github.com/CorentinCls/portfolio_symfony",
            "image" => "https://picsum.photos/200/300",
            "description" => "notre projet client"
        ],

        [
            "name" => "Reims quizz",
            "link" => "https://github.com/CorentinCls/portfolio_symfony",
            "image" => "https://picsum.photos/200/300",
            "description" => "notre projet sur reims"
        ],

        [
            "name" => "Mano mano",
            "link" => "https://github.com/CorentinCls/portfolio_symfony",
            "image" => "https://picsum.photos/200/300",
            "description" => "minou minou"
        ]

    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::PROJECTS as $key => $data)
        {
            $project = new Project();

            $project->setName($data['name']);
            $project->setDate((new \DateTime()));
            $project->setLink($data['link']);
            $project->setImage($data['image']);
            $project->setDescription($data['description']);

            
            $project->addSkill($this->getReference('Skill_' . 'PHP'));

            $manager->persist($project);
        }
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SkillFixtures::class
        ];
    }
}
