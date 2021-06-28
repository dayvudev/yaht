<?php namespace Dayvu\Source\Abstraction;

use Dayvu\Source\Classes\ValueObject\ResourceValueObject;
use Dayvu\Source\Classes\ValueObject\YamlFileValueObject;
use Dayvu\Source\Interfaces\ConfigInterface;
use Dayvu\Source\Interfaces\ValueObject\ResourceValueObjectInterface;
use Dayvu\Source\Interfaces\ValueObject\YamlFileValueObjectInterface;
use Exception;

abstract class AbstractConfig implements ConfigInterface
{
    private YamlFileValueObjectInterface $headConfig;
    private YamlFileValueObjectInterface $bodyConfig;
    private ResourceValueObjectInterface $resultDirection;

    public function __construct()
    {
        $this->init();
    }

    public function init(): void
    {
        if (! defined('HEAD_CONFIG_PATH')) {
            throw new Exception('Constant "HEAD_CONFIG_PATH" is not defined!');
        }

        if (! defined('BODY_CONFIG_PATH')) {
            throw new Exception('Constant "BODY_CONFIG_PATH" is not defined!');
        }

        if (! defined('RESULT_DIRECTION')) {
            throw new Exception('Constant "RESULT_DIRECTION" is not defined!');
        }

        $this->headConfig = new YamlFileValueObject(HEAD_CONFIG_PATH);
        $this->bodyConfig = new YamlFileValueObject(BODY_CONFIG_PATH);
        $this->resultDirection = new ResourceValueObject(RESULT_DIRECTION);
    }

    public function getHeadConfig(): YamlFileValueObjectInterface
    {
        return $this->headConfig;
    }

    public function getBodyConfig(): YamlFileValueObjectInterface
    {
        return $this->bodyConfig;
    }

    public function getResultDirection(): ResourceValueObjectInterface
    {
        return $this->resultDirection;
    }
}