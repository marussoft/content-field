<?php

declare(strict_types=1);

namespace Marussia\Fields\Test;

use PHPUnit\Framework\TestCase;
use Marussia\Fields\FieldsCollector;
use Marussia\Fields\Contracts\FieldHandlerInterface;
use Marussia\Fields\Entities\Field;
use Marussia\Fields\FieldData;

class FieldsCollectorTest extends TestCase
{
    public function testExists()
    {
        $fieldsCollector = $this->fieldsCollector();
        $this->assertTrue($fieldsCollector->exists('test'));
    }
    
    public function testGet()
    {
        $fieldsCollector = $this->fieldsCollector();
        $field = $fieldsCollector->get('test');
        $this->assertInstanceOf(FieldHandlerInterface::class, $field);
    }

    private function fieldsCollector()
    {
        return new FieldsCollector(['test' => TestField::class]);
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
