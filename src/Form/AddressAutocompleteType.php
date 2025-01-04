<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
// use Symfonycasts\DynamicForms\DynamicFormBuilder;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use App\Form\DataTransformer\UcfirstModelTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class AddressAutocompleteType extends AbstractType
{

    public function __construct(private UcfirstModelTransformer $ucfirstTransformer)
    {}

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /**
         * Install DynamicFormBuilder:.
         *
         *    composer require symfonycasts/dynamic-forms
         */
        // $builder = new DynamicFormBuilder($builder);

        $domain=$options['autocomplete_session_domain'];

        $builder
            ->add('postalCode', TextType::class,[
                'autocomplete' => true,
                'max_results' => 100,
                'min_characters' => 1,
                'autocomplete_url' => '/address/autocomplete?field=PLZ&domain='.$domain,
                'tom_select_options' => [
                    'maxOptions' => 100,
                    'maxItems' => 1,
                    'createOnBlur' => true,
                    'create' => true,
                    'selectOnTab' => true,
                    'preload' => true,
                    'loadThrottle' => null
                ]
            ])
            ->add('city', TextType::class,[
                'autocomplete' => true,
                'max_results' => 100,
                'min_characters' => 1,
                'autocomplete_url' => '/address/autocomplete?field=ORT&domain='.$domain,
                'tom_select_options' => [
                    'maxOptions' => 100,
                    'maxItems' => 1,
                    'createOnBlur' => true,
                    'create' => true,
                    'selectOnTab' => true,
                    'preload' => true,
                    'loadThrottle' => null
                ]
            ])
            ->add('street', TextType::class,[
                'autocomplete' => true,
                'max_results' => 100,
                'min_characters' => 1,
                'autocomplete_url' => '/address/autocomplete?field=STRASSE&domain='.$domain,
                'tom_select_options' => [
                    'maxOptions' => 100,
                    'maxItems' => 1,
                    'createOnBlur' => true,
                    'create' => true,
                    'selectOnTab' => true,
                    'preload' => true,
                    'loadThrottle' => null
                ]
            ])
            ->add('number', TextType::class,[
                'autocomplete' => true,
                'max_results' => 100,
                'min_characters' => 1,
                'autocomplete_url' => '/address/autocomplete?field=HAUSNR&domain='.$domain,
                'tom_select_options' => [
                    'maxOptions' => 100,
                    'maxItems' => 1,
                    'createOnBlur' => true,
                    'create' => true,
                    'selectOnTab' => true,
                    'preload' => true,
                    'loadThrottle' => null
                ]
            ])
            ->add('addressextra')
        ;


        $builder->get('city')->addModelTransformer(
            $this->ucfirstTransformer
        );
        $builder->get('city')->addViewTransformer(
            $this->ucfirstTransformer
        );
        $builder->get('street')->addModelTransformer(
            $this->ucfirstTransformer
        );
        $builder->get('street')->addViewTransformer(
            $this->ucfirstTransformer
        );

    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'class' => Address::class,
            'placeholder' => 'Choose a Address',
            'autocomplete_session_domain' => 'default'
            // 'choice_label' => 'name',

            //'query_builder' => function (AddressRepository $addressRepository) {
            //    return $addressRepository->createQueryBuilder('address');
            //},
            // 'security' => 'ROLE_SOMETHING',
        ]);
    }

   
}
