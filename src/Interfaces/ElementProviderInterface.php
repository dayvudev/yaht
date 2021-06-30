<?php namespace Dayvu\Source\Interfaces;

use Dayvu\Source\Interfaces\ValueObject\StringableValueObjectInterface;

interface ElementProviderInterface 
{
    public function provideContent(): StringableValueObjectInterface;
}