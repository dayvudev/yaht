<?php namespace Dayvu\Source\Interfaces;

use Dayvu\Source\Interfaces\ValueObject\IterableValueObjectInterface;
use Dayvu\Source\Interfaces\ValueObject\StringableValueObjectInterface;
use Stringable;

interface ElementInterface extends Stringable
{
    public function getTag(): StringableValueObjectInterface;
    public function getContent(): StringableValueObjectInterface;
    public function getAttributes(): StringableValueObjectInterface;

    /**
     * @return IterableValueObjectInterface<self>
     */
    public function getChildren(): IterableValueObjectInterface;
}