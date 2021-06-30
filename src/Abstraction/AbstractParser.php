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
use Dayvu\Source\Interfaces\ElementProviderInterface;
use Dayvu\Source\Interfaces\ParserInterface;
use Dayvu\Source\Interfaces\ValueObject\StringableValueObjectInterface;
use Exception;

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
            $a = $configRow['a'] ?? '';

            /**
             * @var array<int, string> $explodedElementString
             */
            $explodedElementString = explode('|', $e);

            $element = new BaseElement(
                $this->getTagFromElementString($explodedElementString),
                $this->getContentFromElementString($explodedElementString),
                $this->parseLevel($configRow['c'] ?? []),
                new StringValueObject($a)
            );

            $max = $explodedElementString[2] ?? 1;
            for ($i = 1; $i <= $max; $i++) {
                array_push($elements, $element);
            }
        }

        return new ElementsValueObject($elements);
    }

    /**
     * @param array<int, string> $explodedElementString
     */
    private function getTagFromElementString(array $explodedElementString): StringableValueObjectInterface
    {
        $tag = $explodedElementString[0] ?? null;

        if (null === $tag) {
            throw new Exception('Tag is required!');
        }

        return new StringValueObject((string) $tag);
    }

    /**
     * @param array<int, string> $explodedElementString
     */
    private function getContentFromElementString(array $explodedElementString): StringableValueObjectInterface
    {
        $content = $explodedElementString[1] ?? null;

        if (null !== $content && class_exists($content)) {
            return $this->getElementProvider($content)->provideContent();
        }
        
        return new StringValueObject((string) $content);
    }

    private function getElementProvider(string $providerClass): ElementProviderInterface
    {
        $instance = new $providerClass();

        if (! $instance instanceof ElementProviderInterface) {
            throw new Exception('Content provider must implements: ' . ElementProviderInterface::class);
        }

        return $instance;
    }
}