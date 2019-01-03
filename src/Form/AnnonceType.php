<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    /**
     * @param string $label
     * @param string $placeholder
     * @param array $options
     * @return array
     */
    private function setConfiguration(string $label, string $placeholder, $options = []) : array
    {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder ]
            ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, $this->setConfiguration('Titre', 'Tapez un titre pour votre annonce !'))
            ->add('coverImage', UrlType::class, $this->setConfiguration("Url de l'image principale", "Donnez l'adresse d'une image qui donne vraiment envie"))
            ->add('introduction', TextType::class, $this->setConfiguration('Introduction', "Donnez une description globale de l'annonce !"))
            ->add('content', TextareaType::class, $this->setConfiguration('Description', 'Tapez une description qui donne envie de venir chez vous'))
            ->add('rooms', IntegerType::class, $this->setConfiguration('Nombre de chambres', 'Les chambres disponibles'))
            ->add('price', MoneyType::class, $this->setConfiguration('Prix par nuit', 'Indiquez le prix que vous voulez pour une nuit'))
            ->add('images', CollectionType::class, [
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
