<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $questions = [
            [
                'title' => 'Je suis une question',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, non!',
                'rating' => 20,
                'author' => [
                    'name' => 'Sushi',
                    'avatar' => 'https://randomuser.me/api/portraits/men/2.jpg'
                ],
                'nbReponse' => 15
            ],
            [
                'title' => 'Je suis une question',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, non!',
                'rating' => -15,
                'author' => [
                    'name' => 'Nem',
                    'avatar' => 'https://randomuser.me/api/portraits/women/47.jpg'
                ],
                'nbReponse' => 12
            ]
            ];

        return $this->render('home/index.html.twig', [
            'questions' => $questions
        ]);
    }
}
