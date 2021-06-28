<?php namespace Dayvu\Source\Abstraction;

use Dayvu\Source\Classes\Config;
use Dayvu\Source\Classes\Element\BaseElement;
use Dayvu\Source\Classes\Element\BodyElement;
use Dayvu\Source\Classes\Element\HeadElement;
use Dayvu\Source\Classes\Element\HtmlElement;
use Dayvu\Source\Classes\ValueObject\ElementsValueObject;
use Dayvu\Source\Classes\ValueObject\NullValueObject;
use Dayvu\Source\Classes\ValueObject\StringValueObject;
use Dayvu\Source\Interfaces\ConfigInterface;
use Dayvu\Source\Interfaces\Element\HtmlInterface;
use Dayvu\Source\Interfaces\ElementInterface;
use Dayvu\Source\Interfaces\ParserInterface;
use Dayvu\Source\Interfaces\ValueObject\IterableValueObjectInterface;

abstract class AbstractParser implements ParserInterface
{
    private ConfigInterface $config;

    public function __construct(
        ?ConfigInterface $config = null
    ) {
        if (! $config instanceof ConfigInterface) {
            $this->config = new Config();
        }
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    public function parse(): HtmlInterface {
        /**
         * @var array<array{
         *   'e': string,
         *   'a': string,
         *   'c': array<array{
         *     'e': string,
         *     'a': string,
         *     'c': array
         *   }>
         * }>  $headConfig
         */
        $headConfig = $this->getConfig()->getHeadConfig()->getArray();
        
        /**
         * @var array<array{
         *   'e': string,
         *   'a': string,
         *   'c': array<array{
         *     'e': string,
         *     'a': string,
         *     'c': array
         *   }>
         * }>  $bodyConfig
         */
        $bodyConfig = $this->getConfig()->getBodyConfig()->getArray();

        return new HtmlElement(
            new HeadElement(
               $this->parseLevel($headConfig)
            ),
            new BodyElement(
                $this->parseLevel($bodyConfig)
            )
        );
    }

    /**
     * @param array<array{
     *   'e': string,
     *   'a': string,
     *   'c': array<array{
     *     'e': string,
     *     'a': string,
     *     'c': array
     *   }>
     * }> $config
     * 
     * @return ElementsValueObject<ElementInterface>
     */
    private function parseLevel(array $config): ElementsValueObject
    {
        $elements = [];
        
        foreach ($config as $configRow) {
            $e = $configRow['e'] ?? '';
            $e = explode('|', $e);
            $a = $configRow['a'] ?? '';

            $tag = $e[0];
            $content = $e[1] ?? null;

            $element = new BaseElement(
                new StringValueObject($tag),
                null === $content ? new NullValueObject() : new StringValueObject($content),
                $this->parseLevel($configRow['c'] ?? []),
                new StringValueObject($a)
            );

            array_push($elements, $element);
        }

        return new ElementsValueObject($elements);
    }
}