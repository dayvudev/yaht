<?php namespace Dayvu\Source\Interfaces;

interface ValueObjectInterface 
{
    public function getType(): string;
    public function getValue(): mixed;
    public function isValueEqualTo(ValueObjectInterface $valueObject): bool;
    public function isTypeEqualTo(ValueObjectInterface $valueObject): bool;
}