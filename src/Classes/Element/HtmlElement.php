<?php namespace Dayvu\Source\Classes\Element;

use Dayvu\Source\Abstraction\AbstractElement;
use Dayvu\Source\Classes\ValueObject\ElementsValueObject;
use Dayvu\Source\Classes\ValueObject\NullValueObject;
use Dayvu\Source\Classes\ValueObject\StringValueObject;
use Dayvu\Source\Interfaces\DictionaryInterface;
use Dayvu\Source\Interfaces\Element\BodyInterface;
use Dayvu\Source\Interfaces\Element\HeadInterface;
use Dayvu\Source\Interfaces\Element\HtmlInterface;

class HtmlElement extends AbstractElement implements HtmlInterface
{
    public const ELEMENT_CONTENT_PATTERN = '';
    public const TO_STRING_PATTERN = '<{elementTag} id="{elementId}" {elementAttributes}>{elementChildren}</{elementTag}>';

    public function __construct(
        private HeadInterface $head,
        private BodyInterface $body
    ) {
        parent::__construct(
            new StringValueObject(DictionaryInterface::TAG_NAME_HTML),
            new NullValueObject,
            new ElementsValueObject([$head, $body]),
            new StringValueObject('')
        );
    }

    public function getHead(): HeadInterface
    {
        return $this->head;
    }

    public function getBody(): BodyInterface
    {
        return $this->body;
    }
}