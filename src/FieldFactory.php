<?php

declare(strict_types=1);

namespace Marussia\Fields;

use Marussia\Fields\Field;

class FieldFactory
{
    public function create(array $data) : Field
    {
        $field = new Field();
        $field->js = $data['js'] ?? '';
        $field->css = $data['css'] ?? '';
        $field->html = $data['html'] ?? '';
        
        return $field;
    }
}
