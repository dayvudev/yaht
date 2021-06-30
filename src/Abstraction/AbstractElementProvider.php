<?php namespace Dayvu\Source\Abstraction;

use Dayvu\Source\Interfaces\ElementProviderInterface;
use Dayvu\Source\Interfaces\ValueObject\StringableValueObjectInterface;

abstract class AbstractElementProvider implements ElementProviderInterface
{
    public function __construct(
        private StringableValueObjectInterface $content
    ) { }
    
    public function provideContent(): StringableValueObjectInterface
    {
        return $this->content;    
    }
}