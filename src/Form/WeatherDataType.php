<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\WeatherData;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class WeatherDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('measurement_time')
            ->add('tempereature')
            ->add('humidity')
            ->add('pressure')
            ->add('wind_speed')
            ->add('wind_direction')
            ->add('precipitation_type')
            ->add('precipitation_intensity')
            ->add('location_id', EntityType::class, [
                'class' => Location::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WeatherData::class,
        ]);
    }
}
