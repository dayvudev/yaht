<?php namespace Dayvu\Source\Interfaces\Element;

use Dayvu\Source\Interfaces\ElementInterface;

interface HtmlInterface extends ElementInterface
{
    public function getHead(): HeadInterface;
    public function getBody(): BodyInterface;
}