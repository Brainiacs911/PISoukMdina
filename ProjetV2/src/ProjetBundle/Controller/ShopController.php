<?php

namespace ProjetBundle\Controller;


use ProjetBundle\Entity\Categorie;

use ProjetBundle\Entity\Produit;
use ProjetBundle\Entity\Review;
use ProjetBundle\Form\ReviewType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends Controller
{
   public function ShopAction()
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository(Produit::class)->findAll();
        $categori= $em->getRepository(Categorie::class)->findAll();
        return $this->render('ProjetBundle:Visiteur:Shop.html.twig',array('produits'=>$produit,'cate'=>$categori));
    }
    public function ShopDetailsAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository(Produit::class)->find($id);
        return $this->render('ProjetBundle:Visiteur:SingleShop.html.twig',array('produits'=>$produit,
            'nom' =>$produit->getNom(),'image'=>$produit->getImage(),'nouveausolde'=>$produit->getNouveausolde(),
            'prix'=>$produit->getPrix(),'description'=>$produit->getDescription(),'idcategorie'=>$produit->getIdcategorie()
        ,'id'=>$id));
    }


    public function NoterProduitAction(Request $request,$id){
        $em    = $this->get('doctrine.orm.entity_manager');
         //$em = $this->getDoctrine()->getManager();
         $produit = $em->getRepository('ProjetBundle:Produit')->findOneBy(array('id'=>$id));
         $review = new Review();
         $moy = $em->CreateQuery("SELECT v From ProjetBundle:Review v WHERE v.idprdt=$id");
         $moy1=$moy->getResult();
          $count=count($moy1);

          $review->setIduser($this->getUser());
          $form = $this->createForm(ReviewType::class,$review);
          $form->handleRequest($request);
        if ($form->isSubmitted() && ($form->isValid())&& ($request->isMethod('post'))) {
            $em = $this->getDoctrine()->getManager();
            $rate = $request->get('ratingqualite');
            $review->setNote($rate);


            $em->persist($review);
            $em->flush();
            return $this->redirectToRoute('souk_medina_Shop_Noter',array('id'=>$id));

            }


       return $this->render('ProjetBundle:Visiteur:SingleShop.html.twig',array('produits'=>$produit,
           'nom' =>$produit->getNom(),'image'=>$produit->getImage(),'nouveausolde'=>$produit->getNouveausolde(),
           'prix'=>$produit->getPrix(),'description'=>$produit->getDescription(),'idcategorie'=>$produit->getIdcategorie(),'form'=>$form->createView(),'id'=>$id));

      //  return $this->render('ProjetBundle::test.html.twig',array('produits'=>$produit,'form1'=>$form->createView(),'id'=>$id));


    }



}
