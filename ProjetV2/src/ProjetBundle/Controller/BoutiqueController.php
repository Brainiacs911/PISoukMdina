<?php

namespace ProjetBundle\Controller;

use ProjetBundle\Entity\Boutique;
use ProjetBundle\Form\BoutiqueType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BoutiqueController extends Controller
{
    public function BoutiqueAction()
    {
        return $this->render('ProjetBundle:Visiteur:Boutique.html.twig');
    }
    public function DetailsBoutiqueAction()
    {
        return $this->render('ProjetBundle:Visiteur:SingleBoutique.html.twig');
    }

    public function affichboutAction(){
        $em=$this->getDoctrine()->getManager();
        $boutique=$em->getRepository('ProjetBundle:Boutique')->findAll();
         return $this->render('@Projet/Gerant/Boutique/listeBoutique.html.twig',array('boutiques'=>$boutique));

    }
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {

        return md5(uniqid());
    }

     public function addBoutAction(Request $request){
        $boutique = new Boutique();
         $form=$this->createForm(BoutiqueType::class,$boutique);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             $em = $this->getDoctrine()->getManager();
             $file = $boutique->getImage();

             $filename = $this->generateUniqueFileName() . '.' . $file->guessExtension();
             $file->move(
                 $this->getParameter('brochures_directory'), $filename
             );
             $boutique->setImage($filename);
             $em->persist($boutique);
             $em->flush();
             return $this->redirectToRoute('afficher_boutique');
         }
            return $this->render('@Projet/Gerant/Boutique/ajoutboutique.html.twig',array('form'=>$form->createView()));

     }

     public function updateBoutAction(Request $request,$id)
     {
         $em = $this->getDoctrine()->getManager();
         $boutique = $em->getRepository(Boutique::class)->find($id);
         $form = $this->createForm(BoutiqueType::class, $boutique);
         $form->handleRequest($request);
         if ($form->isSubmitted()) {
             $em = $this->getDoctrine()->getManager();
             $file = $boutique->getImage();

             $filename = $this->generateUniqueFileName() . '.' . $file->guessExtension();
             $file->move(
                 $this->getParameter('brochures_directory'), $filename
             );
             $boutique->setImage($filename);
             $em->persist($boutique);
             $em->flush();
             return $this->redirectToRoute('afficher_boutique');

         }
         return $this->render('@Projet/Gerant/Boutique/modifBoutique.html.twig',array('form'=>$form->createView()));
     }

     public function deleteBoutAction($id){
         $em=$this->getDoctrine()->getManager();
         $boutique=$em->getRepository('ProjetBundle:Boutique')->find($id);
         $em->remove($boutique);
         $em->flush();
         return $this->redirectToRoute('afficher_boutique');

     }

}
