<?php namespace Dayvu\Source\Abstraction;

use Dayvu\Source\Interfaces\ValueObjectInterface;

abstract class AbstractValueObject implements ValueObjectInterface
{
    public function __construct(
        private string $type,
        private mixed $value
    ) {
    }
    
    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function isValid(): bool
    {
        return true;
    }
    
    public function isValueEqualTo(ValueObjectInterface $valueObject): bool
    {
        return $this->getValue() === $valueObject->getValue();
    }
    
    public function isTypeEqualTo(ValueObjectInterface $valueObject): bool
    {
        return $this->getType() === $valueObject->getType();
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}