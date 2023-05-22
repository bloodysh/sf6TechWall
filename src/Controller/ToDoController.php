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
            $this -> addFlash('info', "La liste des todos vient d'être initiliasie");
        }

        return $this->render('to_do/index.html.twig',
        );
    }
    #[Route('/to_do/update/{name}/{content}',name: 'todo.update')]

    public function updateToDo(Request $request, $name, $content){
        $session = $request -> getSession();
        if ($session -> has('todos')){
            $todos = $session -> get('todos');
            if (!isset($todos[$name])) {

                $this -> addFlash('error', 'la liste todo n existe pas');
            }
            else {
                $todos [$name] = $content;
                $session -> set('todos', $todos);
                $this -> addFlash('success', 'le todo d id $name a été ajouté');

            }
        }
        else{
            $this ->addFlash('error', 'la liste des todo n est pas encore initialisée');
        }
        return $this-> redirectToRoute('to_do');
    }
    #[Route('/to_do/add/{name}/{content}',name: 'todo.add')]

    public function addTodo(Request $request, $name, $content){
        $session = $request -> getSession();
        if ($session -> has('todos')){
            $todos = $session -> get('todos');
            if (isset($todos[$name])) {

                $this -> addFlash('error', 'la liste todo avec ce meme id existe');
            }
            else {
                $todos [$name] = $content;
                $session -> set('todos', $todos);
                $this -> addFlash('success', 'le todo d id $name a été ajouté');

            }
        }
        else{
            $this ->addFlash('error', 'la liste des todo n est pas encore initialisée');
        }
        return $this-> redirectToRoute('to_do');
    }

}
