<?php namespace Dayvu\Source\Abstraction;

use Dayvu\Source\Interfaces\ParserInterface;
use Dayvu\Source\Interfaces\ProcessorInterface;

abstract class AbstractProcessor implements ProcessorInterface
{
    abstract protected function getParser(): ParserInterface;

    public function proceed(): void
    {
        $html = $this->getParser()->parse();

        file_put_contents(
            $this->getParser()->getConfig()->getResultDirection()->getPath(),
            (string) $html
        );
    }
}