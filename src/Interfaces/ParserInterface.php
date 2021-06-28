<?php namespace Dayvu\Source\Interfaces;

use Dayvu\Source\Interfaces\Element\HtmlInterface;

interface ParserInterface
{
    public function getConfig(): ConfigInterface;
    public function parse(): HtmlInterface;
}