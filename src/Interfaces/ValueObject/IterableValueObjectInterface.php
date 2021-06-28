<?php namespace Dayvu\Source\Interfaces\ValueObject;

use Dayvu\Source\Interfaces\ValueObjectInterface;
use Iterator;

/**
 * @template T
 * @extends Iterator<int, T>
 */
interface IterableValueObjectInterface extends ValueObjectInterface, Iterator
{
    /**
     * @return array<T>
     */
    public function getValue(): array;
}