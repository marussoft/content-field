<?php

declare(strict_types=1);

namespace Marussia\Fields;

use Marussia\DependencyInjection\Container;
use Marussia\Fields\Contracts\FieldHandlerInterface;

class FieldsCollector extends Container
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
