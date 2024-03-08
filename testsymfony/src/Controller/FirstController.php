<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FirstController extends AbstractController
{
    
    #[Route('/notes', name: 'app_notes')]
     
    public function notes(): Response
    {
        $notes = [3, 7, 10, 13, 5, 7, 18];

        return $this->render('first/index.html.twig', [
            'notes' => $notes,
        ]);
    }
    }

