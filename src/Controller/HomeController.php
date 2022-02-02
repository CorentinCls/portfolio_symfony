<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use phpDocumentor\Reflection\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProjectRepository $projectRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'projects' => $projectRepository->findAll() 
        ]);
    }
}
