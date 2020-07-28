<?php

namespace App\Controller;

use App\Repository\QuotesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param  QuotesRepository  $quotesRepository
     * @return Response
     */
    public function index(QuotesRepository $quotesRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'quotes' => $quotesRepository->findAll()
        ]);
    }
}
