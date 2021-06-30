<?php namespace Dayvu\Source\Classes\Element;

use Dayvu\Source\Abstraction\AbstractElement;
use Dayvu\Source\Classes\ValueObject\ElementsValueObject;
use Dayvu\Source\Classes\ValueObject\NullValueObject;
use Dayvu\Source\Classes\ValueObject\StringValueObject;
use Dayvu\Source\Interfaces\Element\HeadInterface;

class HeadElement extends AbstractElement implements HeadInterface
{
    public const ELEMENT_CONTENT_PATTERN = '';
    public const TO_STRING_PATTERN = '<{elementTag} id="{elementId}" {elementAttributes}>{elementChildren}</{elementTag}>';

    public function __construct(
        private ElementsValueObject $children
    ) {
        parent::__construct(
            new StringValueObject('head'),
            new NullValueObject(),
            $children,
            new StringValueObject('')
        );
    }
}