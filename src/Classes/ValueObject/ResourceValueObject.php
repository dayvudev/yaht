<?php namespace Dayvu\Source\Classes\ValueObject;

use Dayvu\Source\Abstraction\AbstractValueObject;
use Dayvu\Source\Interfaces\ValueObject\ResourceValueObjectInterface;
use Exception;

class ResourceValueObject extends AbstractValueObject implements ResourceValueObjectInterface
{
    public function __construct(
        private string $path
    ) {
        $this->init();

        parent::__construct('string', $this->getPath());
    }
    
    protected function init(): void
    {
        if (! $this->isValid()) {
            throw new Exception('Path "' . $this->getPath() . '" is not readable or doesn\'t exists');
        }
    }
    
    public function getValue(): string
    {
        return $this->path;
    }
    
    public function getPath(): string
    {
        return $this->path;
    }

    public function isValid(): bool
    {
        return file_exists($this->path) && is_readable($this->path);
    }
}