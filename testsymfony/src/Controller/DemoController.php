<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DemoController extends AbstractController
{
    #[Route('/{username}', name: 'user_name')]
    public function index($username)
    {
        return $this->render('demo/index.html.twig', [
            'nom' => $username,
        ]);
    }
}
