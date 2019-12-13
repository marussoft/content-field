<?php

declare(strict_types=1);

namespace Marussia\ContentField;

use Marussia\ContentField\Field;

class FieldFactory
{
    public function create(array $data) : Field
    {
        $field = new Field();
        $field->name = $data['name'] ?? '';
        $field->js = $data['js'] ?? '';
        $field->css = $data['css'] ?? '';
        $field->value = $data['value'] ?? '';

        return $field;
    }
}
