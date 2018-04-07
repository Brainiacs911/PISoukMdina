<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\Categorie;
use ProjetBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{
    public function afficheCatgAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('ProjetBundle:Categorie')->findAll();
        return $this->render('@Projet/Gerant/Categorie/listCat.html.twig',array('categories'=>$categorie));
    }

    public function ajoutCatAction(Request $request){
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class,$categorie);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('afficher_categorie');
        }
          return $this->render('@Projet/Gerant/Categorie/ajoutCat.html.twig',array('form'=>$form->createView()));
   }

   public function deleteCatAction($id){
       $em=$this->getDoctrine()->getManager();
       $categorie=$em->getRepository('ProjetBundle:Categorie')->find($id);
       $em->remove($categorie);
       $em->flush();
       return $this->redirectToRoute('afficher_categorie');

   }

   public function updateCatAction(Request $request,$id){
       $em=$this->getDoctrine()->getManager();
       $categorie=$em->getRepository('ProjetBundle:Categorie')->find($id);
       $form=$this->createForm(CategorieType::class,$categorie);
       $form->handleRequest($request);
       if($form->isSubmitted()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($categorie);
           $em->flush();
           return $this->redirectToRoute('afficher_categorie');
       }
        return $this->render('@Projet/Gerant/Categorie/modifCat.html.twig',array('form'=>$form->createView()));

   }

}
