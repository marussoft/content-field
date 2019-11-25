<?php

declare(strict_types=1);

namespace Marussia\Fields\Actions;

use Marussia\Fields\FieldData;
use Marussia\Fields\FieldHandlerCollector;
use Marussia\Fields\Field;
use Marussia\Fields\Exceptions\FieldTypeNotFoundException;

class GetInputAction
{
    private $fieldCollector;

    public function __construct(FieldHandlerCollector $fieldCollector)
    {
        $this->fieldCollector = $fieldCollector;
    }

    public function execute(FieldData $fieldData) : Field
    {
        if ($this->fieldCollector->exists($fieldData->type) === false) {
            throw FieldTypeNotFoundException($fieldData->type);
        }
        $field = $this->fieldCollector->get($fieldData->type);
        return $field->getInput($fieldData);
    }
}
