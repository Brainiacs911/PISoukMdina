<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CafeHotelController extends Controller
{
    public function CafeHotelAction()
    {
        return $this->render('ProjetBundle:Visiteur:CafeHotel.html.twig');
    }
    public function CafeHotelDetailsAction()
    {
        return $this->render('ProjetBundle:Visiteur:SingleCafeHotel.html.twig');
    }
}
