<?php

declare(strict_types=1);

namespace Marussia\ContentField\Exceptions;

class FieldTypeNotFoundException extends \Exception
{
    public function __construct(string $fieldType)
    {
        parent::__construct('Handler for field type "' . $fieldType . '" not found.');
    }
}
