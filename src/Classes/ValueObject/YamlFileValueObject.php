<?php namespace Dayvu\Source\Classes\ValueObject;

use Dayvu\Source\Interfaces\ValueObject\YamlFileValueObjectInterface;
use Exception;

class YamlFileValueObject extends ResourceValueObject implements YamlFileValueObjectInterface
{
    private string $content;
    
    protected function init(): void
    {
        parent::init();

        if (! function_exists('yaml_parse')) {
            throw new Exception('Required "php_yaml" extension is not loaded!');
        }

        $content = file_get_contents($this->getPath());
        $this->content = false === $content ? '' : $content;
    }
    
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return array<int, array>
     */
    public function getArray(): array
    {
        return yaml_parse($this->getContent());
    }
}