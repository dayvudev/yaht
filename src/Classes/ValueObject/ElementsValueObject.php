<?php namespace Dayvu\Source\Classes\ValueObject;

use Dayvu\Source\Abstraction\AbstractValueObject;
use Dayvu\Source\Interfaces\ElementInterface;
use Dayvu\Source\Interfaces\ValueObject\IterableValueObjectInterface;

/**
 * @implements IterableValueObjectInterface<ElementInterface>
 */
class ElementsValueObject extends AbstractValueObject implements IterableValueObjectInterface
{
    /**
     * @param array<ElementInterface> $value
     */
    public function __construct(
        private array $value,
        private int $position = 0
    ) {
        parent::__construct('iterable', $value);
    }

    /**
     * @return array<ElementInterface>
     */
    public function getValue(): array
    {
        return $this->value;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): ElementInterface
    {
        return $this->value[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        if (! $this->positionExists()) {
            return false;
        }

        return $this->value[$this->position] instanceof ElementInterface;
    }

    private function positionExists(): bool
    {
        return isset($this->value[$this->position]);
    }
}