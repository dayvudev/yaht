<?php namespace Dayvu\Source\Classes;

use Dayvu\Source\Abstraction\AbstractProcessor;
use Dayvu\Source\Interfaces\ParserInterface;

class Processor extends AbstractProcessor
{
    protected function getParser(): ParserInterface
    {
        return new Parser();
    }
}