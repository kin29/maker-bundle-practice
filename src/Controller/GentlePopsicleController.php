<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GentlePopsicleController extends AbstractController
{
    #[Route('/gentle/popsicle', name: 'gentle_popsicle')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/GentlePopsicleController.php',
        ]);
    }
}
