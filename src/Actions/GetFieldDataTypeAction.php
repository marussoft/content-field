<?php

declare(strict_types=1);

namespace Marussia\ContentField\Actions;

use Marussia\ContentField\FieldHandlerCollector;

class GetFieldDataTypeAction
{
    private $fieldCollector;

    private $fieldType = '';

    public function __construct(FieldHandlerCollector $fieldCollector)
    {
        $this->fieldCollector = $fieldCollector;
    }

    public function execute() : FieldDataType
    {
        if ($this->fieldCollector->exists($this->fieldType)) {
            return $this->fieldCollector->get($this->fieldType)->getDataType();
        }
    }

    public function fieldType(string $fieldType)
    {
        $this->fieldType = $fieldType;
    }
}
