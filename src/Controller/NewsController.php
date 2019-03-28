<?php

namespace App\Controller;

use App\Entity\News;

use App\Form\NewsType;
use App\Repository\NewsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     * @return Response
     */
    public function index(NewsRepository $repo, PaginatorInterface $paginator, Request $request) : Response
    {
        $news = $paginator->paginate(
            $repo->findAll(),
        $request->query->getInt('page',1),3);
        return $this->render('news/news.html.twig', [
            'current_menu' => 'newsActive',
            'news' => $news
        ]);
    }
}
