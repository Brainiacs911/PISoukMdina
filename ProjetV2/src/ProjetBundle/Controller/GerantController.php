<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GerantController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProjetBundle::LayoutG.html.twig');
    }
    public function inboxAction()
    {
        return $this->render('ProjetBundle:Gerant:inboxG.html.twig');

    }
}
