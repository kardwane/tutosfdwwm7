<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Undocumented function
     * @return Response
     */
    //une route se compose d'un chemin, d'un nom
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // dd($this); // dd pour dump die (permet de faire un dump et arreter l'execution)
        // dump($this); // fait un dump sans arreter l'execution
        //rend un template
        return $this->render('home/index.html.twig', [
            'valeur' => mt_rand(1, 100) // passe un chiffre aléatoire à la variable valeur
        ]);
    }

    //on peut aussi n'authoriser que certaines methodes HTTP pour accèder au contenu
    #[Route('/about', name: 'app_about', methods: ['GET'])]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }

    //si on a besoin de faire une route parametré, on insert {parametre} dans le chemin de la route
    #[Route('/testparam/{param}', name: 'app_test', methods: ['GET'])]
    // symfony est capable de recuperer un parametre dans l'url et de l'injecter en argument de la fonction
    public function testparam($param): Response
    {
        return $this->render('home/testparam.html.twig', [
            'param' => $param // variable de mon template
        ]);
    }
}
