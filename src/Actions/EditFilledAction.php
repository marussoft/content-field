<?php

declare(strict_types=1);

namespace Marussia\Fields\Actions;

use Marussia\Fields\FieldData;
use Marussia\Fields\FieldsCollector;
use Marussia\Fields\Entities\Field;
use Marussia\Fields\Exceptions\FieldTypeNotFoundException;

class EditFilledAction
{
    private $fieldsCollector;

    public function __construct(FieldsCollector $fieldsCollector)
    {
        $this->fieldsCollector = $fieldsCollector;
    }

    public function execute(FieldData $fieldData) : Field
    {
        if ($this->fieldsCollector->exists($fieldData->type) === false) {
            throw FieldTypeNotFoundException($fieldData->type);
        }
        $field = $this->fieldsCollector->get($fieldData->type);

        return $field->editFilled($fieldData);
    }
}
