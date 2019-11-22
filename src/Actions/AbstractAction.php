<?php

declare(strict_types=1);

namespace Marussia\Fields\Actions;

use Marussia\Fields\FieldData;
use Marussia\Fields\FieldsCollector;
use Marussia\Fields\Entities\Field;
use Marussia\Fields\Exceptions\FieldTypeNotFoundException;

class AbstractAction
{
    protected $fieldsCollector;

    public function __construct(FieldsCollector $fieldsCollector)
    {
        $this->fieldsCollector = $fieldsCollector;
    }

    protected function getField(FieldData $fieldData) : Field
    {
        if ($this->fieldsCollector->exists($fieldData->type) === false) {
            throw FieldTypeNotFoundException($fieldData->type);
        }
        return $this->fieldsCollector->instance($fieldData->type);
    }
}
