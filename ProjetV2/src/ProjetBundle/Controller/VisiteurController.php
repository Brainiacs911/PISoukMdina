<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VisiteurController extends Controller
{
    public function indexAction()
    {
        return $this->render('::base.html.twig');
    }
    public function AboutAction()
    {
        return $this->render('ProjetBundle:Visiteur:About.html.twig');
    }
    public function GallerieAction()
    {
        return $this->render('ProjetBundle:Visiteur:Gallerie.html.twig');
    }
    public function ContactAction()
    {
        return $this->render('ProjetBundle:Visiteur:Contact.html.twig');
    }
    public function CheckOutAction()
    {
        return $this->render('ProjetBundle:Visiteur:CheckOut.html.twig');
    }
    public function PaymenetAction()
    {
        return $this->render('ProjetBundle:Visiteur:PaymentPage.html.twig');
    }
}
