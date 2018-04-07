<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PromotionsController extends Controller
{
    public function PromotionsGerantAction()
    {
        return $this->render('ProjetBundle:Gerant:Promotions.html.twig');
    }
}
