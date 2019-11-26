<?php

declare(strict_types=1);

namespace Marussia\ContentField\Test;

use PHPUnit\Framework\TestCase;
use Marussia\ContentField\FieldHandlerCollector;
use Marussia\ContentField\Contracts\FieldHandlerInterface;
use Marussia\ContentField\Field;
use Marussia\ContentField\FieldData;

class FieldHandlerCollectorTest extends TestCase
{
    public function testExists()
    {
        $fieldsCollector = $this->fieldCollector();
        $this->assertTrue($fieldsCollector->exists('test'));
    }

    public function testGet()
    {
        $fieldCollector = $this->fieldCollector();
        $field = $fieldCollector->get('test');
        $this->assertInstanceOf(FieldHandlerInterface::class, $field);
    }

    private function fieldCollector()
    {
        return new FieldHandlerCollector(['test' => TestField::class]);
    }
}

class TestField implements FieldHandlerInterface
{
    public function getStorageValueType() : string
    {

    }

    public function getStorageValueSize() : int
    {

    }

    public function fill(FieldData $fieldData) : Field
    {

    }

    public function getInput(FieldData $fieldData) : Field
    {

    }

    public function getInputWithValue(FieldData $fieldData) : Field
    {

    }
}
