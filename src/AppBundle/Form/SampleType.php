<?php
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SampleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Following three fields may change when BioControl is integrated.
            ->add('BCExperimentID', IntegerType::class, array('label' => 'BioControl experiment ID'))
            ->add('BCSampleID', IntegerType::class, array('label' => 'BioControl sample ID'))
            ->add('BCRunID', IntegerType::class, array('label' => 'BioControl run ID'))
            ->add('sampledDateTime', DateTimeType::class, array('label' => 'Sample date and time'))
            // Change to EntityType when User table is added.
            ->add('sampledBy', TextType::class)
            ->add('RNALaterTreated',CheckboxType::class,array('label'=>'Treated?'))
            ->add('materialTypeString', EntityType::class, array('class' => 'AppBundle:MaterialTypeStrings','choice_label' => 'type'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Sample',
        ));
    }
}