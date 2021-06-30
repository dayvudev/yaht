<?php namespace Dayvu\Source\Interfaces\ValueObject;

interface YamlFileValueObjectInterface extends ResourceValueObjectInterface
{
    public function getContent(): string;

    /**
     * @return array<int, array>
     */
    public function getArray(): array;
}