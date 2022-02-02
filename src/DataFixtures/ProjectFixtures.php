<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    private const PROJECTS = [
        [
            "name" => "Incit easy",
            "date" => "02/03/2000",
            "link" => "https://github.com/CorentinCls/portfolio_symfony",
            "image" => "https://picsum.photos/200/300",
            "description" => "notre projet client"
        ],

        [
            "name" => "Reims quizz",
            "date" => "02/03/2010",
            "link" => "https://github.com/CorentinCls/portfolio_symfony",
            "image" => "https://picsum.photos/200/300",
            "description" => "notre projet sur reims"
        ],

        [
            "name" => "Mano mano",
            "date" => "02/03/2016",
            "link" => "https://github.com/CorentinCls/portfolio_symfony",
            "image" => "https://picsum.photos/200/300",
            "description" => "minou minou"
        ]

    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::PROJECTS as $data)
        {
            $project = new Project();

            $project->setName($data['name']);
            $project->setDate($data['date']);
            $project->setLink($data['link']);
            $project->setImage($data['image']);
            $project->setDescription($data['description']);

            $manager->persist($project);
        }
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SkillFixtures::class,
        ];
    }
}