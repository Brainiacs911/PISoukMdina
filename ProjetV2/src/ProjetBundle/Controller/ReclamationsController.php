<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ReclamationsController extends Controller
{
    public function ReclamationsAction()
    {
        return $this->render('ProjetBundle:Visiteur:Reclamations.html.twig');
    }
    public function ReclamationsAdminAction()
    {
        return $this->render('ProjetBundle:Admin:Reclmations.html.twig');
    }
    public function ReclamationsGerantAction()
    {
        return $this->render('ProjetBundle:Gerant:Reclmations.html.twig');
    }
}
