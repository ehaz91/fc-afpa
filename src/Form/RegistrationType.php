<?php

namespace App\Form;

use App\Entity\Region;
use App\Entity\Departement;
use App\Entity\Utilisateur;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_utilisateur')
            ->add('prenom_utilisateur')
            ->add('email_utilisateur')
            ->add('telephone_utilisateur')
            ->add('adresse_utilisateur')
            ->add('password', PasswordType::class)
            ->add('confirm_password', PasswordType::class)
            ->add('username')
            ->add('region', EntityType::class, [
                'class' => 'App\Entity\Region',
                'placeholder' => 'Sélectionnez votre région',
                'mapped' => false,
                'required' => false
            ])
        ;

        $builder->get('region')->addEventListener(
            FormEvents::POST_SUBMIT,
            function(FormEvent $event)
            {
                $form = $event->getForm();
                $this->addDepartementField($form->getParent(), $form->getData());
            }
        );
        $builder->addEventListener (
            FormEvents::POST_SET_DATA,
            function (FormEvent $event)
            {
                $data = $event->getData();
                /* @var $ville Ville */
                $ville = $data->getVille();
                $form = $event->getForm();
                 if ($ville) {
      // On récupère le département et la région
      $departement = $ville->getDepartement();
      $region = $departement->getRegion();
      // On crée les 2 champs supplémentaires
      $this->addDepartementField($form, $region);
      $this->addVilleField($form, $departement);
      // On set les données
      $form->get('region')->setData($region);
      $form->get('departement')->setData($departement);
    } else {
      // On crée les 2 champs en les laissant vide (champs utilisé pour le JavaScript)
      $this->addDepartementField($form, null);
      $this->addVilleField($form, null);
    }
            }
        );
    }

    /**
     * Rajoute un champs departement au formulaire
     * @param FormInterface $form
     * @param Region $region
     */
    private function addDepartementField(FormInterface $form, ?Region $region)
    {
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder('departement', EntityType::class, null, [
            'class' => 'App\Entity\Departement',
            'placeholder' => $region ? 'Sélectionnez votre département' : 'Sélectionnez d\'abord votre région',
            'mapped' => false,
            'auto_initialize' => false,
            'required' => false,
            'choices' => $region ? $region->getDetenir() : []
            ]
        );
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function(FormEvent $event)
            {
                $form = $event->getForm();
                $this->addVilleField($form->getParent(), $form->getData());
            }
        );
        $form->add($builder->getForm());
    }

    private function addVilleField(FormInterface $form, ?Departement $departement)
    {
        $form->add('ville', EntityType::class, [
            'class' => 'App\Entity\Ville',
            'placeholder' => $departement ? 'Sélectionnez votre ville' : 'Sélectionnez d\'abord votre département',
            'choices' => $departement ? $departement->getPosseder() : []
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
