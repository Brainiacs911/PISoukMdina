<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\Produit;
use ProjetBundle\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    public function ProduitGAction()
    {
        return $this->render('ProjetBundle:Gerant:ProduitG.html.twig');

    }

    public  function affichPrdtAction(Request $request){
        //$em=$this->getDoctrine()->getManager();
        $em    = $this->get('doctrine.orm.entity_manager');

        $produit=$em->getRepository('ProjetBundle:Produit')->findAll();
        $dql ="select Produit from ProjetBundle:Produit Produit";
        $query = $em->createQuery($dql);

        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 3)
        );
        return $this->render('@Projet/Gerant/Produit/listPrdt.html.twig',array('pagination' => $pagination, 'produits'=>$query));

    }
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {

        return md5(uniqid());
    }
    public function ajoutPrdtAction(Request $request){
        $produit = new Produit();
        $form=$this->createForm(ProduitType::class,$produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $file = $produit->getImage();

            $filename = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'), $filename
            );
            $produit->setImage($filename);
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute('afficher_produit');
        }
           return $this->render('ProjetBundle:Gerant/Produit:ajoutPrdt.html.twig',array('form'=>$form->createView()));
    }

    public function updatePrdtAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $produit = $em->getRepository(Produit::class)->find($id);
        $form=$this->createForm(ProduitType::class,$produit);
        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $file = $produit->getImage();

            $filename = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('brochures_directory'), $filename
            );
            $produit->setImage($filename);
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute('afficher_produit');
        }
        return $this->render('@Projet/Gerant/Produit/modifPrdt.html.twig',array('form'=>$form->createView()));

    }
    public function deletePrdtAction($id){
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository(Produit::class)->find($id);

        $em->remove($produit);
        $em->flush();
        return $this->redirectToRoute('afficher_produit');

    }

}
