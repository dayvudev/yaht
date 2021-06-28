<?php namespace Dayvu\Source\Interfaces\ValueObject;

use Dayvu\Source\Interfaces\ValueObjectInterface;
use Stringable;

interface StringableValueObjectInterface extends ValueObjectInterface, Stringable
{
    public function getValue(): string;
}