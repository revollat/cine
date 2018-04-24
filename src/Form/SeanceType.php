<?php

namespace App\Form;

use App\Entity\Seance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints as Assert;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('horaire', DateTimeType::class, [
				//'years' => range(date('Y') , date('Y') + 1),
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                //'type' => 'datetime',
                'format' => "dd/MM/yyyy HH:mm",
                //'format' => "yyyy-MM-dd'T'HH:mm:ss",
                'html5' => true,
                'required' => true,
                'constraints' => array(
                    new Assert\DateTime(),
                    new Assert\NotNull()
                ),
			])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Seance::class,
        ]);
    }
}
