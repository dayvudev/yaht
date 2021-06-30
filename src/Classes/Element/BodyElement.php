<?php namespace Dayvu\Source\Classes\Element;

use Dayvu\Source\Abstraction\AbstractElement;
use Dayvu\Source\Classes\ValueObject\ElementsValueObject;
use Dayvu\Source\Classes\ValueObject\NullValueObject;
use Dayvu\Source\Classes\ValueObject\StringValueObject;
use Dayvu\Source\Interfaces\Element\BodyInterface;

class BodyElement extends AbstractElement implements BodyInterface
{
    public function __construct(
        private ElementsValueObject $children
    ) {
        parent::__construct(
            new StringValueObject('body'),
            new NullValueObject(),
            $children,
            new StringValueObject('')
        );
    }
}