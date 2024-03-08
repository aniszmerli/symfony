<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SommeController extends AbstractController
{
    
    public function index(): Response
    {
        return $this->render('somme/index.html.twig', [
            'controller_name' => 'SommeController',
        ]);
    }
    #[Route('/somme/{a}/{b}', name: 'app_somme')]
    public function somme($a,$b){
        $s=$a+$b;
        return $this->render('somme/index.html.twig',[
            'op1' => $a,'op2' => $b,'somme' => $s
        ]);
    }
}
