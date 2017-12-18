<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName',TextType::class , ['label' => 'Prénom']);
        $builder->add('lastName', TextType::class, ['label' => 'Nom']);
        $builder->add('email', EmailType::class, ['label' => 'Email']);
        $builder->add('message', TextareaType::class, ['label' => 'Message']);
        $builder->add('submit', SubmitType::class, ['label' => 'Envoyer mon message', 'attr' => ['class' => 'btn btn-info']]);
    }

}
