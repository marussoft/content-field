<?php

declare(strict_types=1);

namespace Marussia\Fields\Test;

use PHPUnit\Framework\TestCase;
use Marussia\Fields\FieldHandlerCollector;
use Marussia\Fields\Contracts\FieldHandlerInterface;
use Marussia\Fields\Field;
use Marussia\Fields\FieldData;
use Marussia\Fields\Actions\GetInputWithValueAction;

class GetInputWithValueActionTest extends TestCase
{
    public function testExecute()
    {
        $editFilledAction = $this->editFilledAction();
        $fieldData = \Mockery::mock(FieldData::class);
        $fieldData->type = 'test';
        $this->assertInstanceOf(Field::class, $editFilledAction->execute($fieldData));
    }

    private function editFilledAction()
    {
        return new GetInputWithValueAction($this->fieldCollector());
    }

    private function fieldCollector()
    {
        return new FieldHandlerCollector(['test' => TestInputWithValueField::class]);
    }
}

class TestInputWithValueField implements FieldHandlerInterface
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
        return \Mockery::mock(Field::class);
    }
}
