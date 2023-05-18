<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
    #[Route('/to_do', name: 'to_do')]
    public function index(Request $request): Response
    {
        $session = $request -> getSession();
        if (!$session -> has('todos')){
            $todos = [
                'achat' => 'acheter clé',
                'sagar' => 'exams'
            ];
            $session -> set('todos', $todos);
        }

        return $this->render('to_do/index.html.twig',
        );
    }
    #[Route('/todo/{name}/{content}',name: 'todo.add')]
    public function addTodo(Request $request, $name, $content){
        if ($session -> has('todos')){

        }

    }
}
