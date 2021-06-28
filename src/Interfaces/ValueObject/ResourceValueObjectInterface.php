<?php namespace Dayvu\Source\Interfaces\ValueObject;

use Dayvu\Source\Interfaces\ValueObjectInterface;

interface ResourceValueObjectInterface extends ValueObjectInterface
{
    /**
     * Resource Path
     */
    public function getValue(): string;
    
    public function getPath(): string;
    public function isValid(): bool;
}