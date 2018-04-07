<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EventsController extends Controller
{
    public function EventsAction()
    {
        return $this->render('ProjetBundle:Visiteur:Events.html.twig');
    }
    public function EventsDetailsAction()
    {
        return $this->render('ProjetBundle:Visiteur:SingleEvents.html.twig');
    }
    public function EventsAdminAction()
    {
        return $this->render('ProjetBundle:Admin:Events.html.twig');
    }
}
