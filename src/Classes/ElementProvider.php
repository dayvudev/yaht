<?php namespace Dayvu\Source\Classes;

use Dayvu\Source\Abstraction\AbstractElementProvider;
use Dayvu\Source\Classes\ValueObject\StringValueObject;

class ElementProvider extends AbstractElementProvider
{
    public function __construct()
    {
        parent::__construct(
            new StringValueObject('Provided Value...')
        );
    }
}