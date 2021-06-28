<?php namespace Dayvu\Source\Classes\ValueObject;

use Dayvu\Source\Abstraction\AbstractValueObject;
use Dayvu\Source\Interfaces\ValueObject\NullValueObjectInterface;
use LogicException;

class NullValueObject extends AbstractValueObject implements NullValueObjectInterface
{
    public function __construct()
    {
        parent::__construct('null', null);
    }

    public function getValue(): mixed
    {
        throw new LogicException('This object doesn\'t have any value!');
    }
}