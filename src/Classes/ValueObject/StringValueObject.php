<?php namespace Dayvu\Source\Classes\ValueObject;

use Dayvu\Source\Abstraction\AbstractValueObject;
use Dayvu\Source\Interfaces\ValueObject\StringableValueObjectInterface;

class StringValueObject extends AbstractValueObject implements StringableValueObjectInterface
{
    public function __construct(
        private string $value
    ) {
        parent::__construct('string', $value);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}