<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TournamentPlusController extends AbstractController
{
    /**
     * @Route("/tournament/plus", name="tournament_plus")
     */
    public function index()
    {
        return $this->render('tournament_plus/index.html.twig', [
            'controller_name' => 'TournamentPlusController',
        ]);
    }
}
