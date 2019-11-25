<?php

declare(strict_types=1);

namespace Marussia\Fields\Test;

use PHPUnit\Framework\TestCase;
use Marussia\Fields\FieldHandlerCollector;
use Marussia\Fields\Contracts\FieldHandlerInterface;
use Marussia\Fields\Field;
use Marussia\Fields\FieldData;

class FieldHandlerCollectorTest extends TestCase
{
    public function testExists()
    {
        $fieldsCollector = $this->fieldCollector();
        $this->assertTrue($fieldsCollector->exists('test'));
    }
    
    public function testGet()
    {
        $fieldsCollector = $this->fieldCollector();
        $field = $fieldsCollector->get('test');
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
