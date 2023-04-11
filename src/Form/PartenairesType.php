<?php

namespace App\Form;

   
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Partenaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class PartenairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('statusEntreprise')
            ->add('isperson',  ChoiceType::class, [
                'choices'  => [
                    ' Cliquez ici pour donner votre Identé' => null,
                    'Personne' => true,
                    'Entreprise' => false,
                ],
            ])
            ->add('idpersonne')
           
            ->add('Enregister', SubmitType::class)
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partenaires::class,
        ]);
    }
}
