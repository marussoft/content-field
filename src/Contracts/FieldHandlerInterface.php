<?php

declare(strict_types=1);

namespace Marussia\ContentField\Contracts;

use Marussia\ContentField\Field;
use Marussia\ContentField\FieldData;
use Marussia\ContentField\FieldDataType;

interface FieldHandlerInterface
{
    public function getDataType() : FieldDataType;

    public function fill(FieldData $fieldData) : Field;

    public function getInput(FieldData $fieldData) : Field;

    public function getInputWithValue(FieldData $fieldData) : Field;
}
