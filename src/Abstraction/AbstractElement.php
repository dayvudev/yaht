<?php namespace Dayvu\Source\Abstraction;

use Dayvu\Source\Classes\ValueObject\ElementsValueObject;
use Dayvu\Source\Classes\ValueObject\StringValueObject;
use Dayvu\Source\Interfaces\ValueObjectInterface;
use Dayvu\Source\Interfaces\ElementInterface;
use Dayvu\Source\Interfaces\ValueObject\IterableValueObjectInterface;
use Dayvu\Source\Interfaces\ValueObject\NullValueObjectInterface;
use Dayvu\Source\Interfaces\ValueObject\StringableValueObjectInterface;
use Exception;

abstract class AbstractElement implements ElementInterface
{
    public const ELEMENT_CONTENT_PATTERN = '<span id="{elementId}">{elementContent}</span>';
    public const TO_STRING_PATTERN = '<{elementTag} id="{elementId}" {elementAttributes}>{elementContentBox}{elementChildren}</{elementTag}>';
    
    private string $uuid;

    /**
     * @param ElementsValueObject<ElementInterface> $children
     */
    public function __construct(
        private StringValueObject $tag,
        private ValueObjectInterface $content,
        private ElementsValueObject $children,
        private StringableValueObjectInterface $attributes
    ) {
        $this->uuid = uniqid('element-');
    }

    public function getTag(): StringValueObject
    {
        return $this->tag;
    }
    
    public function getContent(): ValueObjectInterface
    {
        return $this->content;
    }

    /**
     * @return IterableValueObjectInterface<ElementInterface>
     */
    public function getChildren(): IterableValueObjectInterface
    {
        return $this->children;
    }

    public function getAttributes(): StringableValueObjectInterface
    {
        return $this->attributes;
    }

    public function __toString(): string
    {
        $subContents = [];
        foreach ($this->getChildren() as $child) {
            $subContents[] = (string) $child;
        }
        
        $value = str_replace(
            '{elementContentBox}',
            $this->getContent() instanceof NullValueObjectInterface ? '' : static::ELEMENT_CONTENT_PATTERN,
            static::TO_STRING_PATTERN
        );

        $value = str_replace(
            [
                '{elementId}',
                '{elementTag}',
                '{elementContent}',
                '{elementChildren}',
                '{elementAttributes}'
            ],
            [
                $this->uuid,
                $this->getTag(),
                $this->getContent() instanceof NullValueObjectInterface ? '' : $this->getContent(),
                implode('', $subContents),
                $this->getAttributes()
            ],
            $value
        );

        if (is_array($value)) {
            throw new Exception('Value must be type of "string", but has type "array"!');
        }

        return $value;
    }

    
}