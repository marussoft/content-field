<?php

declare(strict_types=1);

namespace Marussia\Fields\Actions;

class GetInputAction extends AbstractAction
{
    public function execute(FieldData $fieldData) : Field
    {
        $field = $this->getField($fieldData->type);
        return $field->getInput($fieldData);
    }
}
