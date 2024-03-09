<?php

namespace App\Form;

use App\Entity\Actividades;
use App\Entity\Usuario;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActividadesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nombre')
            ->add('categoria')
            ->add('FechaInicio', null, [
                'widget' => 'single_text',
                'label' => 'Fecha de Inicio',
            ])
            ->add('FechaFin', null, [
                'widget' => 'single_text',
                'label' => 'Fecha Fin',
            ])
            ->add('IdUsuario', EntityType::class, [
                'class' => Usuario::class,
                'choice_label' => 'Nombre',
                'multiple' => true,
                'label' => 'Cliente',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actividades::class,
        ]);
    }
}
