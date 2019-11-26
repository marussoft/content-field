<?php

declare(strict_types=1);

namespace Marussia\ContentField;

use Marussia\DependencyInjection\Container;
use Marussia\ContentField\Contracts\FieldHandlerInterface;

class FieldHandlerCollector extends Container
{
    private $fieldsClassMap;

    public function __construct(array $fieldsClassMap, array $providers = [])
    {
        $this->fieldsClassMap = $fieldsClassMap;

        parent::__construct();
    }

    public function exists(string $fieldType) : bool
    {
        return array_key_exists($fieldType, $this->fieldsClassMap);
    }

    public function get(string $fieldType) : FieldHandlerInterface
    {
        return $this->instance($this->fieldsClassMap[$fieldType]);
    }
}
