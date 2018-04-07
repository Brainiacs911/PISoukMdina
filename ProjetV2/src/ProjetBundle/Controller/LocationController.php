<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocationController extends Controller
{
    public function LocationAdminAction()
    {
        return $this->render('ProjetBundle:Admin:Location.html.twig');
    }
}
