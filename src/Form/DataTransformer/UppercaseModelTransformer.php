<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class UppercaseModelTransformer implements DataTransformerInterface
{

    public function transform($value):string
    {
        return $value?strtoupper($value):"";
    }

    public function reverseTransform($value):string
    {
        return $value?strtoupper($value):"";
    }



}