<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class UcfirstModelTransformer implements DataTransformerInterface
{

    public function transform($value):string
    {
        return $value?$this->mb_ucfirst($value):"";
    }

    public function reverseTransform($value):string
    {
        return $value?$this->mb_ucfirst($value):"";
    }

    private function mb_ucfirst($str) {
        $fc = mb_strtoupper(mb_substr($str, 0, 1));
        return $fc.mb_substr($str, 1);
    }



}