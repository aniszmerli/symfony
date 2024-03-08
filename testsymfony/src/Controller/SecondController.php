<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SecondController extends AbstractController
{
    #[Route('/second', name: 'app_second')]
    public function index(): Response
    {
        return $this->render('pages/second.html.twig', [
        ]);
    }
}
