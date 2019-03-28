<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use App\Repository\MatchsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClassementController extends AbstractController
{
    /**
     * @Route("/classement", name="classement")
     * * @return Response
     */
    public function index(NewsRepository $repo, MatchsRepository $repoMatchs): Response
    {       
        $news = $repo->findLastFourNews();
        $NextFourMatchs = $repoMatchs->findNextFourMatchs(1);
        return $this->render('classement/classement.html.twig', [
         
            'controller_name' => 'ClassementController',
            'news' => $news,
            'NextFourMatchs' => $NextFourMatchs,
            'current_menu' => 'classementActive'
        ]);

        
    }

    
}
