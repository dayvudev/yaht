<?php namespace Dayvu\Source\Interfaces;

use Dayvu\Source\Interfaces\ValueObject\ResourceValueObjectInterface;
use Dayvu\Source\Interfaces\ValueObject\YamlFileValueObjectInterface;

interface ConfigInterface
{
    public function getHeadConfig(): YamlFileValueObjectInterface;
    public function getBodyConfig(): YamlFileValueObjectInterface;
    public function getResultDirection(): ResourceValueObjectInterface;
}