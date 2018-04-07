<?php

namespace ProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProjetBundle::LayoutA.html.twig');
    }
    public function inboxAction()
    {
        return $this->render('ProjetBundle::LayoutA.html.twig');
    }
    public function GalleryAction()
    {
        return $this->render('ProjetBundle:Admin:Gallery.html.twig');
    }


}
