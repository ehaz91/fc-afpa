<?php

namespace App\Controller;

use App\Repository\SponsorsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SponsorsController extends AbstractController
{
    /**
     * @Route("/sponsors", name="sponsors")
     */
    public function index(SponsorsRepository $repo)
    {
        $sponsors = $repo->findAll();
        return $this->render('sponsors/index.html.twig', [
            'sponsors' => $sponsors
        ]);
    }
}
