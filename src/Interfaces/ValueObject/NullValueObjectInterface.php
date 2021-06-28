<?php namespace Dayvu\Source\Interfaces\ValueObject;

use LogicException;
use Dayvu\Source\Interfaces\ValueObjectInterface;

interface NullValueObjectInterface extends ValueObjectInterface
{
    /**
     * @throws LogicException
     */
    public function getValue(): mixed;
}