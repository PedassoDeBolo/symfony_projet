<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;

class TP1Controller extends AbstractController
{

    public function index(): Response
    {
        //Recuperation du repository de l'entité Stages
        $repositoryStage = $this->getDoctrine()->getRepository(Formation::class);
        // Recuperation des donnees requises en BD
        $stages = $repositoryStage->findAll();

        return $this->render('tp1/index.html.twig', ['stages' => $stages]);
    }

    public function entreprises(): Response
    {
        return $this->render('tp1/entreprises.html.twig');
    }

    public function formations(): Response
    {
        return $this->render('tp1/formations.html.twig');
    }

    public function stages($id): Response
    {
        return $this->render('tp1/stages.html.twig',
        ['idStage' => $id]);
    }
}
