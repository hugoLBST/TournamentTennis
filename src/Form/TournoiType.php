<?php

namespace App\Form;

use App\Entity\Tournoi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TournoiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('adresse')
            ->add('dateDebutTournoi')
            ->add('dateFinTournoi')
            ->add('estVisible')
            ->add('surface')
            ->add('categorieAge')
            ->add('genreHomme')
            ->add('description')
            ->add('dateDebutInscription')
            ->add('dateFinInscription')
            ->add('inscriptionManuelle')
            ->add('nombrePlaces')
            ->add('motDePasse')
            ->add('validationInscriptions')
            ->add('nbSetsGagnants')
            ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tournoi::class,
        ]);
    }
}
