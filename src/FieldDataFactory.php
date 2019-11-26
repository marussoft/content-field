<?php

declare(strict_types=1);

namespace Marussia\ContentField;

class FieldDataFactory
{
    public function create(array $data) : FieldData
    {
        $fieldData = new FieldData;
        $fieldData->type        = $data['type'];
        $fieldData->name        = $data['name'];
        $fieldData->title       = $data['title'];
        $fieldData->description = $data['description'];
        $fieldData->options     = $data['options'];
        $fieldData->required    = $data['required'];

        if (isset($data['value'])) {
            $fieldData->value = $data['value'];
        }

        return $fieldData;
    }
}
