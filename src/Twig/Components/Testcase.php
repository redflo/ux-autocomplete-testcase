<?php

namespace App\Twig\Components;

use App\Form\AddressAutocompleteType;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;



#[AsLiveComponent]
final class Testcase extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    protected function instantiateForm():FormInterface
    {
        return $this->createForm(AddressAutocompleteType::class);
    }
}
