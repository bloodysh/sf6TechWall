<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/sayHello/{name}', name: 'say.hello')]
    public function sayHello($name): Response
    {
        return $this->render('first/hello.html.twig', ['nom'=> $name]);
    }
}
