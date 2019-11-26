<?php

declare(strict_types=1);

namespace Marussia\ContentField\Actions;

use Marussia\ContentField\FieldData;
use Marussia\ContentField\FieldHandlerCollector;
use Marussia\ContentField\Field;
use Marussia\ContentField\Exceptions\FieldTypeNotFoundException;

class FillAction
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
        return $field->fill($fieldData);
    }
}
