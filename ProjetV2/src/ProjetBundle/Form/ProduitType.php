<?php

namespace ProjetBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
                ->add('prix')
                ->add('description', TextareaType::class)
                ->add('nouveausolde')
                ->add('image',FileType::class,array('data_class' => null))
                ->add('dateajout')
                ->add('etatprod',ChoiceType::class,array(
                    'choices' => array(
                        'disponible' => true,
                        'non disponible' =>false
                    ),
                ))
                ->add('idcategorie',EntityType::class,array(
                    'class' =>'ProjetBundle\Entity\Categorie',
                    'placeholder' =>'Selectionnez votre catégorie',
                    'choice_label' =>'nom',
                    'multiple' => false
                ))
               ->add('idboutique',EntityType::class,array(
                   'class' =>'ProjetBundle\Entity\Boutique',
                   'placeholder' =>'Selectionnez votre boutique',
                   'choice_label' =>'nomBoutique',
                   'multiple' =>false
               ))
              ->add('Enregistrer',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projetbundle_produit';
    }


}
